<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest\AddProductRequest;
use App\Http\Requests\ProductRequest\EditProductRequest;
use App\Product;
use App\Category;
use App\Traits\ProductTrait;
use Illuminate\Support\Facades\Validator;

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
        $products= Product::with('category')->paginate(7);

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
        $categories = Category::get();
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

        $count = Product::where('category_id','=',$product->category_id)->count();

        return view('products/show',compact(['product','category','count']));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

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
