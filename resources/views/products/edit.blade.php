@extends('layouts.app')

@section('content')
    <h1 class="text-center text-primary">{{__('messages.Edit Product')}}</h1>

    @include('inc.errors')
    @include('inc.messages')

    <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label class="font-weight-bold" for="name_en">{{__('messages.Product Name en')}}</label>
            <input type="text" name="name_en" class="form-control" id="name_en" value="{{$product->name_en}}" placeholder="{{__('messages.Product Name en')}}">
        </div>
        <div class="form-group">
            <label class="font-weight-bold" for="name_ar">{{__('messages.Product Name ar')}}</label>
            <input type="text" name="name_ar" class="form-control" id="name_ar" value="{{$product->name_ar}}" placeholder="{{__('messages.Product Name ar')}}">
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="quantity">{{__('messages.Quantity')}}</label>
            <input type="text" name="quantity" class="form-control" id="quantity" value="{{$product->quantity}}"  placeholder="{{__('messages.Enter Quantity')}}">
        </div>


       <div class="form-group">
            <label class="font-weight-bold" for="price">{{__('messages.Price')}}</label>
            <input type="text" name="price" class="form-control" id="price" value="{{$product->price}}" placeholder="{{__('messages.Enter Price')}}">
        </div>

       <div class="form-group">
            <label class="font-weight-bold" for="img">{{__('messages.Image')}}</label><br>
            @if($product->img !== null )
	           <img src="{{asset('images/'.$product->img)}}" class="my-2" width="100" height="100" placeholder="{{__('messages.Image is not exists')}}">
	        @endif
            <input type="file" name="img" class="form-control" id="img"  placeholder="">
        </div>



        @if (LaravelLocalization::getCurrentLocale() == 'en')
        <div class="form-group">
             <label class="font-weight-bold" for="categories">{{__('messages.Categories')}}</label>
             <select class="form-control" id="categories" name="category_id">
                 @foreach($categories as $cat)
                     <option value="{{ $cat->id }}"  @if( $cat->id == $product->category_id) selected  @endif > {{$cat->name_en}} </option>
                 @endforeach
             </select>
         </div>
         
         @else
         <div class="form-group">
              <label class="font-weight-bold" for="categories">{{__('messages.Categories')}}</label>
              <select class="form-control" id="categories" name="category_id">
                  @foreach($categories as $cat)
                      <option value="{{ $cat->id }}"  @if( $cat->id == $product->category_id) selected  @endif > {{$cat->name_ar}} </option>
                  @endforeach
              </select>
          </div>

        @endif

        <div class="form-group">
            <label class="font-weight-bold" for="exampleFormControlTextarea1">{{__('messages.Description')}}</label>
            <textarea class="form-control" name="description_en" id="exampleFormControlTextarea1" rows="5">{{$product->description_en}}</textarea>
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="exampleFormControlTextarea1">{{__('messages.Description')}}</label>
            <textarea class="form-control" name="description_ar" id="exampleFormControlTextarea1" rows="5">{{$product->description_ar}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{__('messages.Submit')}}</button>
    </form>

@endsection