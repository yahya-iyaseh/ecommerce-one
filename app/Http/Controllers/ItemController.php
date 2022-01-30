<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::latest()->get();
        // dd($items);
        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $item = new Item;
        return view('admin.item.create', compact('categories', 'item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());
        $imageName = $request->file('image')->store('public/items');
        Item::create($this->attributes($request, $imageName));
        notify()->success('The Item was successfully created');
        return redirect()->route('admin.item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('admin.item.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $this->validate($request, $this->rules($item->id));
        if (!isset($request->image)) {
            $imageName = $item->image;
        } else {
            $imageName = $request->file('image')->store('public/items');
            \Storage::delete($item->image);
        }
        $item->update($this->attributes($request, $imageName));
        notify()->success('The Item was successfully updated', 'Update Item');

        return redirect()->route('admin.item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        \Storage::delete($item->image);
        $item->delete();
        notify()->warning('The Item was successfully deleted');
        return redirect()->route('admin.item.index');
    }

    protected function attributes($request, $imageName)
    {

        return [
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imageName,
            'description' => $request->description,
            'additional_info' => $request->additional_info,
            'category_id' => $request->category_id,
            'sub_category' => $request->sub_category,
        ];
    }
    protected function rules($id = null)
    {
        if (!$id) {
            $req = 'required';
        } else {
            $req = 'nullable';
        }
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('items', 'name')->ignore($id)],
            'price' => ['required', 'numeric'],
            'image' => [$req, 'mimes:jpeg, jpg, png', 'max:2024'],
            'description' => ['nullable',],
            'additional_info' => ['nullable',],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
