<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $categories = Category::find(3);
        $categories= Category::where('id',3)->get();

        $subcategories= SubCategory::where('category_id',3)->get();

        // return $categories;
        return view('categories.create',compact(['subcategories','categories']));
    }

    public function ajax(Request $request)
    {
            $cat_id = $request->cat_id;
            $subcategories = Subcategory::where('category_id','=',$cat_id)->get();
            return Response()->json($subcategories);

    }

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

    public function edit($subCategory)
    {
        $subcategories = SubCategory::get();
        $subcategory = SubCategory::findOrFail($subCategory);
        return view('subcategories.edit',compact(['subcategory','subcategories']));
    }

    public function update(Request $request, $id)
    {
        // dd($request->name);
        $subCat = SubCategory::findOrFail($id);
        // dd($subCat);
        $subCat->update([
            'name'=> $request->name,
        ]);
        return redirect()->back()->with(['success'=>"$subCat->name updated successfully"]);
    }

    public function destroy($subCategory)
    {
        $sub = SubCategory::find($subCategory);
        $sub->delete();
        return redirect()->back()->with(['success'=>"$sub->name SubCategory Deleted Successfully"]);
    }

}
