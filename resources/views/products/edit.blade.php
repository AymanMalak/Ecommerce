@extends('layouts.app')

@section('content')
    <h1 class="text-center text-primary">Edit Product</h1>

    @include('inc.errors')
    @include('inc.messages')

    <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label class="font-weight-bold" for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}" placeholder="Enter Name">
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="price">Quantity</label>
            <input type="text" name="quantity" class="form-control" id="price" value="{{$product->quantity}}"  placeholder="Enter Quantity">
        </div>


       <div class="form-group">
            <label class="font-weight-bold" for="price">Price</label>
            <input type="text" name="price" class="form-control" id="price" value="{{$product->price}}" placeholder="Enter price">
        </div>
        
       <div class="form-group">
            <label class="font-weight-bold" for="price">Image</label><br>
            @if($product->img !== null )
	           <img src="{{asset('images/'.$product->img)}}" class="my-2" width="100" height="100" placeholder="image not exists">
	        @endif
            <input type="file" name="img" class="form-control" id=""  placeholder="">
        </div>

       <div class="form-group">
            <label class="font-weight-bold" for="categories">Categories</label>
            <select class="form-control" id="categories" name="category_id">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"  @if( $cat->id == $product->category_id) selected  @endif > {{$cat->name}} </option>
                @endforeach
            </select>
                  {{-- {{$cat->id}}  {{$cat->name}} <br> 
                  {{$product->category_id}} {{$product->category->name}} --}}
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5">{{$product->description}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection