@extends('layouts.app')
@section('content')






<div class="container py-3">
    @if (LaravelLocalization::getCurrentLocale() == 'ar')        
        @if($count > 1)
            <h1 class="text-center font-weight-bold  text-primary">يوجد {{$count}} {{ $category->name_ar}}</h1>
        @else
            <h1 class="text-center font-weight-bold  text-primary">يوجد {{$count}} {{ $category->name_ar}}</h1>
        @endif
    @else
        @if($count > 1)
            <h1 class="text-center font-weight-bold  text-primary">There are {{$count}} {{$category->name_en}}S</h1>
        @else
            <h1 class="text-center font-weight-bold  text-primary">There is {{$count}} {{$category->name_en}}</h1>
        @endif
        
    @endif

    <div class="row">
        <div class="col-md-6 pt-3">
	           <img class="card-img-top" src="{{asset('images/'.$product->img)}}"  alt="Card image cap" class="my-2" placeholder="{{__('messages.Image Not Exist')}}">
        </div>
        <div class="col-md-6">
            <div class="card my-3">
                <div class="card-body">
                    @if (LaravelLocalization::getCurrentLocale() == 'ar')  
                        <h2 class="card-title font-weight-bold"> {{__('messages.Product Name ar')}}:  <span class="font-weight-normal  text-primary">  {{$product->name_ar}}</span> </h2>
                    @else
                        <h2 class="card-title font-weight-bold"> {{__('messages.Product Name en')}}:  <span class="font-weight-normal  text-primary">  {{$product->name_en}}</span> </h2>
                    @endif
                    
                    <h2 class="card-text font-weight-bold "> {{__('messages.Price')}}: <span class="font-weight-normal  text-muted"> {{$product->price}} {{__('messages.LE')}} </span> </h2>
                    <h2 class="card-text font-weight-bold "> {{__('messages.Quantity')}}: <span class="font-weight-normal  text-muted"> {{$product->quantity}} {{__('messages.Pieces')}} </span> </h3>
                    
                    @if (LaravelLocalization::getCurrentLocale() == 'ar')  
                        <h2 class="card-text font-weight-bold "> {{__('messages.Description ar')}}: <span class="font-weight-normal  text-secondary"> {{$product->description_ar}} </span> </h2>
                    @else
                        <h2 class="card-text font-weight-bold "> {{__('messages.Description en')}}: <span class="font-weight-normal  text-secondary"> {{$product->description_en}} </span> </h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
<style>
span{
    font-size: 24px !important
}
</style>
