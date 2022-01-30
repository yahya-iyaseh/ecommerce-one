<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['isAdmin', 'auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = SubCategory::latest()->get();


        return view('admin.subCategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.subCategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());
        SubCategory::create($request->all());
        notify()->success('The Sub Category has been created');
        return redirect()->route('admin.subCategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();
        return view('admin.subCategory.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $this->validate($request, $this->rules($subCategory->id));
        $subCategory->update($request->all());
        notify()->success( 'SubCategory updated successfully', 'update Sub Category');
        return redirect()->route('admin.subCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        notify()->warning( 'SubCategory deleted successfully', 'Delete Sub Category');
        return redirect()->route('admin.subCategory.index');
    }

    protected function rules($id = null)
    {

        return $rule = [
            'name' => ['required', 'string', Rule::unique('sub_categories', 'name')->ignore($id)],
            'category_id' => ['required', 'exists:categories,id']
        ];
    }

    public function getSubCategory(Request $request, $id){

        $subCategories = SubCategory::where( 'category_id', $id)->pluck('name', 'id');

        return response()->json($subCategories);
    }
}
