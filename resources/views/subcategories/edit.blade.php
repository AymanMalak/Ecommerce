@extends('layouts.app')

@section('content')
    <h1 class="text-center text-primary">{{__('messages.Edit SubCategory')}}</h1>

    @include('inc.errors')
    @include('inc.messages')

    <form action="{{route('subcategory.update',$subcategory->id)}}" method="post" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="font-weight-bold" for="name">{{__('messages.SubCategory Name')}}</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$subcategory->name}}" placeholder="{{__('messages.SubCategory Name')}}">
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
