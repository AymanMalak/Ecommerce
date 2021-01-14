<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\SubCategoryRequest\SubCategoryRequest;
use LaravelLocalization;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $subcategories = SubCategory::select(
            'id',
            'name_'. LaravelLocalization::getCurrentLocale(). ' as name'
            )->get();
        return view('subcategories.all',compact(['subcategories']));
    }

    public function ajax(Request $request)
    {
            $cat_id = $request->cat_id;
            $subcategories = Subcategory::where('category_id','=',$cat_id)->get();
            return Response()->json($subcategories);

    }

    public function create()
    {
        // $subcategories = SubCategory::with('category')->get();
        $subcategories = SubCategory::select(
            'id',
            'category_id',
            'name_'. LaravelLocalization::getCurrentLocale(). ' as name'
            )->get();
        // $subcategory = SubCategory::findOrFail($subCategory);
        $categories = Category::get();
        // dd($subcategories);
        return view('subcategories.create',compact(['categories','subcategories']));
    }

    public function store(SubCategoryRequest $request)
    {
        SubCategory::create([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'category_id'=>$request->category_id,
        ]);
        return redirect()->back()->with(
            'success',"$request->name subcategory added successfully"
        );
    }

    public function edit($subCategory)
    {
        // $subcategories = SubCategory::get();
        $subcategories = SubCategory::select(
            'id',
            'category_id',
            'name_'. LaravelLocalization::getCurrentLocale(). ' as name'
            )->get();
        $subcategory = SubCategory::findOrFail($subCategory);
        // dd($subcategories);
        return view('subcategories.edit',compact(['subcategory','subcategories']));
    }

    public function update(SubCategoryRequest $request, $id)
    {
        // dd($request->name);
        $subCat = SubCategory::findOrFail($id);
        // dd($subCat);
        $subCat->update([
            'name_ar'=> $request->name_ar,
            'name_en'=> $request->name_en,
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
