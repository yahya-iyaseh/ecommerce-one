<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $categories  = Category::latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'categoryName' => ['required',  'max:255', 'unique:categories,name'],
            'description' => ['required', 'max:500'],
            'image' => ['required', 'mimes:png,bmp,jpg,jpeg'],
        ]);

        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        // $request->image->move(public_path('images'), $imageName);
         $imageName = $request->file('image')->store(
            'public/images',
        );
        Category::create([
            'name' => $request->categoryName,
            'description' => $request->description,
            'image' => $imageName,
            'slug' => Str::slug($request->categoryName),
        ]);
        notify()->success('The Category was created successfully');
        return Redirect::route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'categoryName' => ['required',  'max:255',Rule::unique('users', 'name')->ignore($category->id),],
            'description' => ['required', 'max:500'],
            'image' => ['mimes:png,bmp,jpg,jpeg'],
        ]);
        if(isset($request->image)){
            \Storage::delete($request->image);
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            // $request->image->move(public_path('images'), $imageName);
            $imageName = $request->file('image')->store(
                'public/images',
            );
        }else{
            $imageName = $category->image;
        }

        $category->update([
            'name' => $request->categoryName,
            'description' => $request->description,
            'image' => $imageName,
            'slug' => Str::slug($request->categoryName),
        ]);
        notify()->success('The Category was Updated successfully');
        return Redirect::route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $file = $category->image;
        $category->delete();
        \Storage::delete($file);
        notify()->success('The Category was Deleted successfully', 'Delete Category');
        // connectify('success','Delete Category', 'The Category was Deleted successfully');
        return Redirect::route('admin.category.index');
    }
}
