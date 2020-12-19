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
                <option value="" selected> Options ... </option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"> {{$cat->name}} </option>
                @endforeach
            </select>
        </div>

        {{-- ------------------------------------------ --}}
        {{-- <div class="form-group">
            <select name="category" id="category" class="form-control input-sm">
                @foreach($categories as $a)
                <option value="{{$a}}">{{$a}}</option>
                    @endforeach
            </select>
        </div> --}}

        <div class="form-group">
            <label class="font-weight-bold" for="categories">SubCategories</label>
            <select name="subcategory" id="subcategory" class="form-control input-sm">
                    <option class="font-weight-bold" value=""></option>
            </select>
        </div>
        {{-- ------------------------------------------ --}}

        <div class="form-group">
            <label class="font-weight-bold" for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
@section('scripts')
    <script>
        console.log('ssssssssssssssssssssssssss');
        $(document).ready(function () { 
            // $.get('/ajax-subcat?cat_id='+ cat_id,function(data){});
                $('#categories').on('change',function(e){
                    // console.log(e);
                    var cat_id = e.target.value;
                    console.log(cat_id);
                    //ajax
                    $.get('/ajax-subcat?cat_id='+ cat_id,function(data){
                        //success data
                    console.log(data);
                        $('#subcategory').empty();
                    $.each(data,function(index,subcatObj){
                        // var option = $('<option/>', {id:create, value:subcatObj});
                        $('#subcategory').append('<option class="" style="font-size:16px" value="'+subcatObj.value+'">'+subcatObj.name+'</option>');
                    });
                });
            });
        });
    </script>
@endsection