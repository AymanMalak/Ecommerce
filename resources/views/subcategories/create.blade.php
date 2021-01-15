@extends('layouts.app')

@section('content')
    <h1 class="text-center text-primary">{{__('messages.Add New SubCategory')}}</h1>

    @include('inc.errors')
    @include('inc.messages')

    <form action="{{route('subcategory.store')}}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label class="font-weight-bold" for="name_en">{{__('messages.SubCategory Name en')}}</label>
            <input type="text" name="name_en" class="form-control" id="name_en"  placeholder="{{__('messages.SubCategory Name en')}}">
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="name_ar">{{__('messages.SubCategory Name ar')}}</label>
            <input type="text" name="name_ar" class="form-control" id="name_ar"  placeholder="{{__('messages.SubCategory Name ar')}}">
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
                                @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                
                        <th scope="col" class="text-center" >{{__('messages.SubCategory Name ar')}}</th>
                        <th scope="col" class="text-center" >{{__('messages.Category Name ar')}}</th>
                                @else
                        <th scope="col" class="text-center">{{__('messages.SubCategory Name en')}}</th>
                        <th scope="col" class="text-center">{{__('messages.Category Name en')}}</th>
                                
                                @endif
                        @auth
                        <th scope="col" class="text-center">{{__('messages.Operations')}}</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>

                    @forelse ($subcategories as $p)
                    
                    <tr>
                        <th scope="row">{{$p->id}}</th>
                        <td class="font-weight-bold text-center">{{$p->name}}</td>
                        
                        @if (LaravelLocalization::getCurrentLocale() == 'ar')
                            <td class="font-weight-bold text-center">{{$p->category->name_ar}}</td>
                        @else
                            <td class="font-weight-bold text-center">{{$p->category->name_en}}</td>
                        @endif

                            @auth
                                <td class="d-flex justify-content-center">
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
                        {{--  <div class="alert alert-danger text-center font-weight-bold">
                            {{__('messages.There is no SubCategories')}}
                        </div>  --}}
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
