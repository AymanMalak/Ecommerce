@extends('layouts.app')

@section('content')
    <h1 class="text-center text-primary">{{__('messages.Add New Category')}}</h1>

    @include('inc.errors')
    @include('inc.messages')

    <form action="{{route('category.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label class="font-weight-bold" for="name_en">{{__('messages.Category Name')}}</label>
            <input type="text" name="name_en" class="form-control" id="name_en"  placeholder="{{__('messages.Category Name')}}">
        </div>
        <div class="form-group">
            <label class="font-weight-bold" for="name_ar">{{__('messages.Category Name ar')}}</label>
            <input type="text" name="name_ar" class="form-control" id="name_ar"  placeholder="{{__('messages.Category Name ar')}}">
        </div>

        <button type="submit" class="btn btn-primary">{{__('messages.Submit')}}</button>
    </form>
    
    <h1 class="text-center text-info">{{__('messages.All Categories')}}</h1>
    
    <div class="horscrol">
        <div class="horscroldiv">
            <table class="table my-3">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('messages.Category')}}</th>
                        @auth
                        <th scope="col">{{__('messages.Operations')}}</th>
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
                                    <a href="{{route('category.edit',$p->id)}}" class="btn btn-info mr-2">{{__('messages.Edit')}}</a> 
                                    <form action="{{route('category.destroy',$p->id)}}" method="POST" >
                                        @method("DELETE")
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="{{__('messages.Delete')}}"> 
                                    </form>
                                </td>
                            @endauth
                        </tr>
                    @empty
                        <div class="alert alert-danger text-center font-weight-bold">
                            {{__('messages.There is no Categories')}}
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


@endsection