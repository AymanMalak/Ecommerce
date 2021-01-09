@extends('layouts.app')
@section('content')






<div class="container py-3">
    @if($count > 1)
    <h1 class="text-center font-weight-bold  text-primary">There are {{$count}} {{$category->name}}S</h1>
    @else
    <h1 class="text-center font-weight-bold  text-primary">There is {{$count}} {{$category->name}}</h1>
    @endif
    <div class="row">
        <div class="col-md-6 pt-3">
	           <img class="card-img-top" src="{{asset('images/'.$product->img)}}"  alt="Card image cap" class="my-2" placeholder="image not exists">
        </div>
        <div class="col-md-6">
            <div class="card my-3">
                <div class="card-body">
                    <h2 class="card-title font-weight-bold"> Name:  <span class="font-weight-normal  text-primary">  {{$product->name}}</span> </h2>
                    <h2 class="card-text font-weight-bold "> Price: <span class="font-weight-normal  text-muted"> {{$product->price}} LE. </span> </h2>
                    <h2 class="card-text font-weight-bold "> Quantity: <span class="font-weight-normal  text-muted"> {{$product->quantity}} pieces. </span> </h3>
                    <h2 class="card-text font-weight-bold "> Description: <span class="font-weight-normal  text-secondary"> {{$product->description}} </span> </h2>
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
