<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontProductListController extends Controller
{
    protected $subCategoriesIds = null;
    public function index(Category $category, Request $request)
    {
        // dd($request->category);
        if ($category->exists) {
            $products = Item::latest()->limit(9)->where('category_id', $category->id)->get();
            if ($request->subcategory) {
                // filtter the subCategory
                $products = $this->filtterProducts($request->subcategory);
            }
        } else {
            $products = Item::latest()->limit(9)->get();
        }

        $randomActiveProducts = Item::inRandomOrder()->limit(9)->get();

        // dd($category->subCategory()->count());
        // dd($products);
        $subCategoriesIds = $this->subCategoriesIds;

        return view('products.index', [
            'products' => $products,
            'category' => $category,
            'subCategories' => $category->subCategory,
            'subCategoriesIds' => $subCategoriesIds,
            'randomActiveProducts' => $randomActiveProducts,
        ]);
    }
    public function show($id)
    {

        $product  = Item::findOrFail($id);
        $productsFromSameCategory = Item::inRandomOrder()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(3)
            ->get();
        // dd( $productsFromSameCategory->get());
        return view('products.show', [
            'product' => $product,
            'products' => $productsFromSameCategory,
        ]);
    }

    public function filtterProducts($subCategories)
    {
        $subId = [];
        $subCategoriesId = SubCategory::whereIn('slug', $subCategories)->get();
        foreach ($subCategoriesId as $sub) {
            array_push($subId, $sub->id);
        }
        $this->subCategoriesIds = $subId;
        return  Item::whereIn('sub_category', $subId)->get();
    }
}
