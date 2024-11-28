<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = \App\Models\Category::all()->sortBy('name');
        
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:50|unique:categories,name'
        ];
        $validator = $this->validate($request, $rules);

        $category = new \App\Models\Category;
        $category->name = $request->name;
        $category->save();

        //Flash a success message
        Session::flash('success', 'A new category has been created');
        
        //redirect to index
        return redirect()->route('categories.index');
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
        //retrieve the Category corresponding to the passed key value
        $category = \App\Models\Category::find($id);
        if (!$category) dd("no category found");

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);
        $rules = [
            'name' => 'required|max:50|unique:categories,name,'.$id
        ];
        $validator = $this->validate($request, $rules);

        $category = \App\Models\Category::find($id);
        if (!$category) dd("no category found");

        $category->name = $request->name;
        $category->save();

        //Flash a success message
        Session::flash('success', 'The category has been updated');
        
        //redirect to index
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dd('delete');
        $category = \App\Models\Category::find($id);
        if (!$category) { 
            //dd("no Category found");
            Session::flash('error', 'No Category found');
        } else {
            $category->delete();
            Session::flash('success', 'Category deleted');
        }

        return redirect()->route('categories.index');
    }

    public function confirmDelete(string $id)
    {
        //
    }
}
