@extends('layouts.app')

@section('content')
    <h1 class="text-center text-primary">Edit Category</h1>

    @include('inc.errors')
    @include('inc.messages')

    <form action="{{url('category/update',$category->id)}}" method="post" >
        @csrf
        <div class="form-group">
            <label class="font-weight-bold" for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$category->name}}" placeholder="Category Name">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <ul>
        @foreach($categories as $cat)
        
        <li>
            {{$cat->id}} - {{$cat->name}}
        </li>
        @endforeach
    </ul>
@endsection