<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest\CategoryRequest;
use LaravelLocalization;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){}

    public function create()
    {
        $categories = Category::get();
        $categories = Category::select(
            'id',
            'name_'. LaravelLocalization::getCurrentLocale(). ' as name'
            )->get();
        // $subcategory = SubCategory::findOrFail($subCategory);
        // $categories = Category::get();
        return view('categories.create',compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $categories = Category::get();

        Category::create([
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
        ]);

        return redirect()->back()->with([
            'success'=>"$request->name Category Is Added Successfully",
            'categories'=>$categories,
        ]);
    }

    public function show($id){}

    public function edit($subCategory)
    {
        $category = Category::findOrFail($subCategory);
        $categories = Category::select(
            'id',
            'name_'. LaravelLocalization::getCurrentLocale(). ' as name'
            )->get();
        // $categories = Category::get();
        return view('categories.edit',compact(['category','categories']));
    }

    public function update(CategoryRequest $request, $subCategory)
    {
        $category = Category::findOrFail($subCategory);
        $category->update([
            'name'=> $request->name,
        ]);
        return redirect()->back()->with(['success'=>"$category->name updated successfully"]);
    }

    public function destroy($id)
    {
        $category =Category::findOrFail($id);
        if(!$category)
            return back()->with(['error'=>'There is no category for delete']);

        $category->delete();

        return back()->with(['success'=>"$category->name Category Deleted Successfully"]);
    }

}
