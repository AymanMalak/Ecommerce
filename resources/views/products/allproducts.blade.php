@extends('layouts.app')
@section('content')    

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    {{-- <th scope="col">Quantity</th> --}}
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    @auth
                    <th scope="col">Operations</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $p)
                    <tr>
                        <th scope="row">{{$p->id}}</th>
                        <td class="font-weight-bold text-primary"><a href="{{url('product',$p->id)}}">{{$p->name}} </a></td>
                        <td class="font-weight-bold text-danger">{{$p->category->name}}</td>
                        <td class="font-weight-bold text-danger">{{$p->price}} LE</td>
                        {{-- <td class="font-weight-bold">{{$p->quantity}}</td> --}}
                        {{-- @if($p->img !== null) --}}
                            <td class="font-weight-bold"><a href="{{url('product',$p->id)}}" class="btn btn-info p-0"><img src="{{asset('images/'.$p->img)}}"  width="90" height="90"></a></td>
                        {{-- @endif --}}
                        <td class="font-weight-bold text-muted"> <?=  Str::substr($p->description,1 ,30)." ..." ?></td>
                        @auth
                            <td> <a href="{{url('product',$p->id)}}" class="btn btn-info">Show</a> <a href="{{route('product.edit',$p->id)}}" class="btn btn-secondary">Edit</a> <a href="{{route('product.destroy',$p->id)}}" class="btn btn-danger">Delete</a> </td>
                        @endauth
                    </tr>
                @empty
                    <div class="alert alert-danger text-center font-weight-bold">
                        There is no products
                    </div>
                @endforelse
            </tbody>
        </table>
        

        <p class="text-center">
            {!! $products->render() !!}
        </p>


@endsection

{{-- <form method="DELETE" class="d-inline" action="{{url('product',$p->id)}}"><input class="btn btn-danger text-white" type="submit" name="submit" value="Delete"></form> --}}