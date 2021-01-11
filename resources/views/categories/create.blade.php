@extends('layouts.app')

@section('content')
    <h1 class="text-center text-primary">Add New Category</h1>

    @include('inc.errors')
    @include('inc.messages')

    <form action="{{route('category.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label class="font-weight-bold" for="name">Category Name</label>
            <input type="text" name="name" class="form-control" id="name"  placeholder="category Name">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
    <h1 class="text-center text-info">All Categories</h1>
    
    <div class="horscrol">
        <div class="horscroldiv">
            <table class="table my-3">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        @auth
                        <th scope="col">Operations</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $p)
                        <tr>
                            <th scope="row">{{$p->id}}</th>
                            <td class="font-weight-bold text-danger">{{$p->name}}</td>
                            @auth
                                <td class="row">  
                                    <a href="{{route('category.edit',$p->id)}}" class="btn btn-info mr-2">Edit</a> 
                                    <form action="{{route('category.destroy',$p->id)}}" method="POST" >
                                        @method("DELETE")
                                        @csrf
                                        <input href="{{route('category.destroy',$p->id)}}" type="submit" class="btn btn-danger" value="Delete"> 
                                    </form>
                                </td>
                            @endauth
                        </tr>
                    @empty
                        <div class="alert alert-danger text-center font-weight-bold">
                            There is no Categories
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


@endsection