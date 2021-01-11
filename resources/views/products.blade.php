@extends('layouts.app')
@section('content')
    <div class="container py-3">
        <div class="row">
                @foreach ( $products as $p )
                    <div class="col-md-4">
                        <div class="card my-3 p-1" style="border:2px solid #aaa;border-radius:7px" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="300" data-aos-easing="ease">
                           
                            <a href="{{url('product',$p->id)}}" class="btn btn-info p-0"><img src="{{asset('images/'.$p->img)}}" class="card-img-top"  height="300px"></a>
                            
                            <div class="card-body" style="border-top: 1px solid #aaa;">
                                <h3 class="card-title"> <a href="{{url('product',$p->id)}}">{{$p->name}} </a></h3>
                                <h5 class="text-primary"> {{$p->price}} LE </h5>
                                <p class="card-text text-muted">  <?=  Str::substr($p->description,1 ,30)." ..." ?></p>

                                @guest
                                    <a href="{{url('product',$p->id)}}" class="btn btn-info form-control" >Show</a> 
                                @endguest

                                @auth
                                    <div class="row mx-auto"> 
                                            <a href="{{url('product',$p->id)}}" class="btn btn-info mx-1">Show</a> 
                                            <a href="{{route('product.edit',$p->id)}}" class="btn  mx-1 btn-secondary">Edit</a> 
                                            <form action="{{route('product.destroy',$p->id)}}" method="POST" >
                                                @method("DELETE")
                                                @csrf
                                                <input href="{{route('product.destroy',$p->id)}}" type="submit" class="btn  mx-1 btn-danger" value="Delete"> 
                                            </form>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
    <style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    img {
        max-width: 100%;
        width: 100%;
    }

</style>
@endsection