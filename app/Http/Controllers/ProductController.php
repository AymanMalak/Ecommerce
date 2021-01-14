<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest\AddProductRequest;
use App\Http\Requests\ProductRequest\EditProductRequest;
use App\Product;
use App\Category;
use App\Traits\ProductTrait;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;
class ProductController extends Controller
{

    use ProductTrait;

    public function __construct()
    {
        $this->middleware(['auth','verified'])->except('products');
    }
    // table
    public function index()
    {

        $products= Product::with('category')->get();
        // $products= Product::get();

        if(!$products)
            return redirect()->back()->with(['error'=>'There is no products']);

        return view('products.allproducts',compact(['products']));
    }

    // card
    public function products()
    {

        $products= Product::get();
        if(!$products)
            return redirect()->back()->with(['error'=>'There is no products']);

        return view('products',compact(['products']));
    }

    public function create()
    {
        $categories = Category::select(
            'id',
            'name_'. LaravelLocalization::getCurrentLocale(). ' as name'
            )->get();
        if(!$categories)
            return view('products.create');

        return view('products.create',compact('categories'));
    }

    public function store(AddProductRequest $request)
    {

        // validation and messages errors in request ProductRequest

        // upload Image
        $img_name = $this->saveImage( $request->img );

        // create product
        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'img'=>$img_name,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
        ]);

        // creation successfully return with success message
        return redirect()->back()->with('success',"$request->name Product Is Added Successfully");
    }

    public function show($id)
    {
        $product =Product::findOrFail($id);
        $category = Category::find($product->category_id);
        // ---------
        // $category = Category::select(
        //     'id',
        //     'name_'. LaravelLocalization::getCurrentLocale(). ' as name'
        //     )->where('id',$product->category_id)->first();
        // dd($category);
        // ---------
        $count = Product::where('category_id','=',$product->category_id)->count();

        return view('products/show',compact(['product','category','count']));
    }

    public function edit($id)
    {
        $product = Product::select(
            // 'id',
            'price',
            'quantity',
            'img',
            'category_id',
            'name_'. LaravelLocalization::getCurrentLocale(). ' as name',
            'description_'. LaravelLocalization::getCurrentLocale(). ' as description',
            )->where('id',$id)->get();
        // $product = Product::findOrFail($id);
        // dd($product);
        $categories = Category::get();

        return view('products.edit',compact(['product','categories']));
    }

    public function update(EditProductRequest $request, $id)
    {
        // validation and messages errors in request ProductRequest

        $product = Product::findOrFail($id);
        $image = $request->img;
        $oldImage= $product->img;

        if($request->hasFile('img')){
            // delete the old
            if(($image) !== null){
                unlink( public_path("images/$oldImage") );
            }

            $img_name = $this->saveImage( $request->img );

            // dd($extention);
            $product->update([
                'name'=> $request->name,
                'price'=> $request->price,
                'quantity'=> $request->quantity,
                'img'=> $img_name,
                'description'=> $request->description,
                'category_id'=> $request->category_id,
            ]);
        }

        $product->update([
            'name'=> $request->name,
            'price'=> $request->price,
            'quantity'=> $request->quantity,
            'description'=> $request->description,
            'category_id'=> $request->category_id,
        ]);

        return redirect()->back()->with(['success'=>"$product->name updated successfully"]);
    }

    public function destroy($id)
    {
        // find product with all columns
        $product =Product::findOrFail($id);

        // find img
        $img=$product->img;

        // if the img exists delete it
        if(($img) !== null){
            unlink( public_path("images/$img") );
        }

        // delete product after deleteing the image
        $product->delete();

        // return success message with deleted item
        return back()->with(['success'=>'product deleted successfully']);
    }

}
