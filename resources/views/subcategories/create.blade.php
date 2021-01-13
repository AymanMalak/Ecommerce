@extends('layouts.app')

@section('content')
    <h1 class="text-center text-primary">{{__('messages.Add New SubCategory')}}</h1>

    @include('inc.errors')
    @include('inc.messages')

    <form action="{{route('subcategory.store')}}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label class="font-weight-bold" for="name">{{__('messages.SubCategory Name')}}</label>
            <input type="text" name="name" class="form-control" id="name"  placeholder="{{__('messages.SubCategory Name')}}">
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

        <button type="submit" class="btn btn-primary">{{__('messages.Submit')}}</button>
    </form>

    <h1 class="text-center text-info mt-2">{{__('messages.All SubCategories')}}</h1>

    <div class="horscrol">
        <div class="horscroldiv">
            <table class="table my-3">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('messages.SubCategory Name')}}</th>
                        <th scope="col">{{__('messages.Category Name')}}</th>
                        @auth
                        <th scope="col">{{__('messages.Operations')}}</th>
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
                                <td class="row">
                                    <a href="{{route('subcategory.edit',$p->id)}}"  class="btn btn-info mx-1">{{__('messages.Edit')}}</a>
                                    <form action="{{route('subcategory.destroy',$p->id)}}" method="POST" >
                                        @method("DELETE")
                                        @csrf
                                        <input type="submit" class="btn btn-danger mx-1" value="{{__('messages.Delete')}}">
                                    </form>
                                </td>
                            @endauth
                        </tr>
                    @empty
                        <div class="alert alert-danger text-center font-weight-bold">
                            {{__('messages.There is no SubCategories')}}
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
