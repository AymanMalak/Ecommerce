<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::find(3);
        $categories= Category::where('id',3)->get();

        $subcategories= SubCategory::where('category_id',3)->get();

        // return $categories;
        return view('categories.create',compact(['subcategories','categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        // $categories = Category::get();
        // $subCategories=SubCategory::with('category')->get();
        // $subcategories= SubCategory::where('category_id',3)->get();

        // dd($subcategories->name);

        // return $categories;

            $cat_id = $request->cat_id;

            $subcategories = Subcategory::where('category_id','=',$cat_id)->get();

            return Response()->json($subcategories);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::with('category')->get();
        $categories = Category::get();
        return view('subcategories.create',compact(['subcategories','categories']));
    }
    public function store(Request $request)
    {

        SubCategory::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
        ]);
        return redirect()->back()->with(
            'success',"$request->name subcategory added successfully"
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($subCategory)
    {
        $sub = SubCategory::find($subCategory);
        $sub->delete();
        return redirect()->back()->with(['success'=>"$sub->name SubCategory Deleted Successfully"]);
    }
}
