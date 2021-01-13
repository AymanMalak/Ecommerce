@extends('layouts.app')

@section('content')
    <h1 class="text-center text-primary">{{__('messages.Edit Category')}}</h1>

    @include('inc.errors')
    @include('inc.messages')

    <form action="{{route('category.update',$category->id)}}" method="post" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="font-weight-bold" for="name">{{__('messages.Name')}}</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$category->name}}" placeholder="{{__('messages.Category Name')}}">
        </div>

        <button type="submit" class="btn btn-primary">{{__('messages.Submit')}}</button>
    </form>

    <br>
    <ul>
        @foreach($categories as $cat)
        <li>
            {{$cat->id}} - {{$cat->name}}
        </li>
        @endforeach
    </ul>

@endsection