@extends('layouts.app')

@section('content')
    <h1 class="text-center text-primary">{{__('messages.Add New Product')}}</h1>

    @include('inc.errors')
    @include('inc.messages')

    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="form-group">
            <label class="font-weight-bold" for="name_en">{{__('messages.Product Name en')}}</label>
            <input type="text" name="name_en" class="form-control" id="name_en"  placeholder="{{__('messages.Product Name en')}}">
        </div>
        <div class="form-group">
            <label class="font-weight-bold" for="name_ar">{{__('messages.Product Name ar')}}</label>
            <input type="text" name="name_ar" class="form-control" id="name_ar"  placeholder="{{__('messages.Product Name ar')}}">
        </div>

       <div class="form-group">
            <label class="font-weight-bold" for="price">{{__('messages.Price')}}</label>
            <input type="text" name="price" class="form-control" id="price"  placeholder="{{__('messages.Enter Price')}}">
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="Quantity">{{__('messages.Quantity')}}</label>
            <input type="text" name="quantity" class="form-control" id="Quantity"  placeholder="{{__('messages.Enter Quantity')}}">
        </div>

       <div class="form-group">
            <label class="font-weight-bold" for="img">{{__('messages.Image')}}</label>
            <input type="file" name="img" class="form-control" id="img"  placeholder="">
        </div>

       <div class="form-group">
            <label class="font-weight-bold" for="categories">{{__('messages.Categories')}}</label>
            <select class="form-control" id="categories" name="category_id">
                <option value="" selected> {{__('messages.Options')}} ... </option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"> {{$cat->name}} </option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label class="font-weight-bold" for="subcategory">{{__('messages.SubCategories')}}</label>
            <select name="subcategory" id="subcategory" class="form-control input-sm">
                    <option class="font-weight-bold" value=""></option>
            </select>
        </div>

        {{-- ------------------------------------------ --}}

        <div class="form-group">
            <label class="font-weight-bold" for="exampleFormControlTextarea1">{{__('messages.Description en')}}</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="exampleFormControlTextarea2">{{__('messages.Description ar')}}</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea2" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{__('messages.Submit')}}</button>
    </form>

@endsection



@include('inc.ajax')


