<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        
    }

    public function create()
    {
        $categories = Category::get();
        return view('categories.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $categories = Category::get();

        Category::create([
            'name'=>$request->name,
        ]);
        return redirect()->back()->with([
            'success'=>"$request->name Category Is Added Successfully",
            'categories'=>$categories,    
        ]);
    }

    public function show(SubCategory $subCategory)
    {
        //
    }

    public function edit($subCategory)
    {
        $category = Category::findOrFail($subCategory);
        $categories = Category::get();
        // $categories = Category::get();
        
        return view('categories.edit',compact(['category','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subCategory)
    {
        $category = Category::findOrFail($subCategory);

        $category->update([
            'name'=> $request->name,
        ]);

        return redirect()->back()->with(['success'=>'Category updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($subCategory)
    {
        // $category =Category::findOrFail($subCategory);
        // if(!$category)
        //     return back()->with(['error'=>'There is no category for delete']);

        // $category->delete();

        // return back()->with(['success'=>'Category Deleted Successfully']);
    }
}
