@extends('layouts.app')

@section('content')
    <h1 class="text-center text-primary">Add New Category</h1>

    @include('inc.errors')
    @include('inc.messages')

    <form action="{{route('category.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label class="font-weight-bold" for="name">Category Name</label>
            <input type="text" name="name" class="form-control" id="name"  placeholder="category Name">
        </div>

        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <h1>
        categories
    </h1>
    <ul>

        @foreach($categories as $cat)
        
        <li>
            {{$cat->name}}
        </li>
        @endforeach
    </ul>

@endsection