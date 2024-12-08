<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = \App\Models\Item::all()->sortBy('name');
        
        return view('items.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        $item = (object) ['categories'=>$categories];
        return view('items.create')->with('item', $item);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'sku' => 'required'
        ];
        $validator = $this->validate($request, $rules);
     
        $item = new \App\Models\Item;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = (double)$request->price;
        $item->quantity = (int)$request->quantity;
        $item->category_id = (int)$request->category_id;
        $item->sku = $request->sku;
        $item->save();

        //Flash a success message
        Session::flash('success', 'A new item has been created');
        
        //redirect to index
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //retrieve the company corresponding to the passed key value
        $item = \App\Models\Item::find($id);

        $categories = \App\Models\Category::all();
        $item->categories = $categories;

        if (!$item) dd("no item found");

        return view('items.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'sku' => 'required'
        ];
        $validator = $this->validate($request, $rules);

        $item = \App\Models\Item::find($id);
        if (!$item) dd("no item found");

        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = (double)$request->price;
        $item->quantity = (int)$request->quantity;
        $item->category_id = (int)$request->category_id;
        $item->sku = $request->sku;
        $item->picture = $request->picture;
        $item->save();

        //Flash a success message
        Session::flash('success', 'The item has been updated');
        
        //redirect to index
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dd('delete');
        $item = \App\Models\Item::find($id);
        if (!$item) { 
            //dd("no company found");
            Session::flash('error', 'No item found');
        } else {
            $item->delete();
            Session::flash('success', 'Item deleted');
        }

        return redirect()->route('items.index');
    }

    public function confirmDelete(string $id)
    {
        //
    }
}
