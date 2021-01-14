@extends('layouts.app')

@section('content')
    <h1 class="text-center text-primary">{{__('messages.Edit SubCategory')}}</h1>

    @include('inc.errors')
    @include('inc.messages')

    <form action="{{route('subcategory.update',$subcategory->id)}}" method="post" >
        @csrf

        @method('PUT')

        <div class="form-group">
            <label class="font-weight-bold" for="name_en">{{__('messages.SubCategory Name en')}}</label>
            <input type="text" name="name_en" class="form-control" id="name_en" value="{{$subcategory->name_en}}" placeholder="{{__('messages.SubCategory Name en')}}">
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="name_ar">{{__('messages.SubCategory Name ar')}}</label>
            <input type="text" name="name_ar" class="form-control" id="name_ar" value="{{$subcategory->name_ar}}" placeholder="{{__('messages.SubCategory Name ar')}}">
        </div>

        <button type="submit" class="btn btn-primary">{{__('messages.Submit')}}</button>
    </form>

    <ul>
        @foreach($subcategories as $cat)

        <li>
            {{$cat->id}} - {{$cat->name}}
        </li>
        @endforeach
    </ul>
@endsection
