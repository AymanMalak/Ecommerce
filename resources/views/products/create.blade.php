@extends('layouts.app')

@section('content')
    <h1 class="text-center text-primary">Add New Product</h1>

    @include('inc.errors')
    @include('inc.messages')

    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="font-weight-bold" for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name"  placeholder="Enter Name">
        </div>

       <div class="form-group">
            <label class="font-weight-bold" for="price">Price</label>
            <input type="text" name="price" class="form-control" id="price"  placeholder="Enter price">
        </div>
        
       <div class="form-group">
            <label class="font-weight-bold" for="price">Image</label>
            <input type="file" name="img" class="form-control" id=""  placeholder="">
        </div>

       <div class="form-group">
            <label class="font-weight-bold" for="categories">Categories</label>
            <select class="form-control" id="categories" name="category_id">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"> {{$cat->name}} </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection