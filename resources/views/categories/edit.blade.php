@extends('layouts.app')

@section('content')
    <h1 class="text-center text-primary">{{__('messages.Edit Category')}}</h1>

    @include('inc.errors')
    @include('inc.messages')

    <form action="{{route('category.update',$category->id)}}" method="post" >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="font-weight-bold" for="name_en">{{__('messages.Category Name en')}}</label>
            <input type="text" name="name_en" class="form-control" id="name_en"  value="{{$category->name_en}}" placeholder="{{__('messages.Category Name en')}}">
        </div>
        <div class="form-group">
            <label class="font-weight-bold" for="name_ar">{{__('messages.Category Name ar')}}</label>
            <input type="text" name="name_ar" class="form-control" id="name_ar"  value="{{$category->name_ar}}" placeholder="{{__('messages.Category Name ar')}}">
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
