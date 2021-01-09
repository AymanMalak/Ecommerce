@extends('layouts.app')

@section('content')
    <h1 class="text-center text-primary">Add New SubCategory</h1>

    @include('inc.errors')
    @include('inc.messages')

    <form action="{{route('subcategory.store')}}" method="POST">
        @csrf


        <div class="form-group">
            <label class="font-weight-bold" for="name">SubCategory Name</label>
            <input type="text" name="name" class="form-control" id="name"  placeholder="subcategory Name">
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

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <h1 class="text-center text-info mt-2">All SubCategories</h1>

    <table class="table my-3">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">SubCategory Name</th>
                <th scope="col">Category Name</th>
                @auth
                <th scope="col">Operations</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @forelse ($subcategories as $p)
                <tr>
                    <th scope="row">{{$p->id}}</th>
                    <td class="font-weight-bold ">{{$p->name}}</td>
                    <td class="font-weight-bold text-secondary">{{$p->category->name}}</td>
                    @auth
                        <td>  <a href="{{route('subcategory.destroy',$p->id)}}" class="btn btn-danger">Delete</a> </td>
                    @endauth
                </tr>
            @empty
                <div class="alert alert-danger text-center font-weight-bold">
                    There is no SubCategories
                </div>
            @endforelse
        </tbody>
    </table>

@endsection
