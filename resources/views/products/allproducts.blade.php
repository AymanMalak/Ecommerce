@extends('layouts.app')
@section('content')

        <div class="horscrol">
            <div class="horscroldiv">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="">#</th>
                            <th scope="">{{__('messages.Name')}}</th>
                            <th scope="">{{__('messages.Category')}}</th>
                            <th scope="">{{__('messages.Price')}}</th>
                            <th scope="">{{__('messages.Quantity')}}</th>
                            <th scope="">{{__('messages.Image')}}</th>
                            <th scope="">{{__('messages.Description')}}</th>
                            @auth
                            <th scope="">{{__('messages.Operations')}}</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $p)
                            <tr>
                                <th scope="">{{$p->id}}</th>
                                <td class="font-weight-bold text-primary"><a href="{{url('product',$p->id)}}">{{$p->name}} </a></td>
                                <td class="font-weight-bold text-danger">{{$p->category->name}}</td>
                                <td class="font-weight-bold text-secondary">{{$p->price}} LE</td>
                                <td class="font-weight-bold text-primary">{{$p->quantity}}</td>
                                @if($p->img !== null)
                                    <td class="font-weight-bold"><a href="{{url('product',$p->id)}}" class="btn btn-info p-0"><img src="{{asset('images/'.$p->img)}}"  width="90" height="90"></a></td>
                                @endif
                                <td class="font-weight-bold text-muted"> <?=  Str::substr($p->description,1 ,30)." ..." ?></td>
                                @auth
                                    <td class="row"> 
                                        <a href="{{url('product',$p->id)}}" class="btn btn-info mx-1">{{__('messages.Show')}}</a> 
                                        <a href="{{route('product.edit',$p->id)}}" class="btn  mx-1 btn-secondary">{{__('messages.Edit')}}</a> 
                                        <form action="{{route('product.destroy',$p->id)}}" method="POST" >
                                            @method("DELETE")
                                            @csrf
                                            <input href="{{route('product.destroy',$p->id)}}" type="submit" class="btn  mx-1 btn-danger" value="{{__('messages.Delete')}}"> 
                                        </form>
                                    </td>
                                @endauth
                            </tr>
                        @empty
                            <div class="alert alert-danger text-center font-weight-bold">
                                {{__('messages.There is no products')}}
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <style>
        .horscrol {
            overflow-x: auto !important;
            overflow-y:hidden  !important;
        }
        .horscroldiv{
            position:relative  !important;
            min-width:max-content  !important;
            padding-bottom:15px  !important;
        }
        </style> --}}
        <p class="text-center">
            {!! $products->render() !!}
        </p>


@endsection

{{-- <form method="DELETE" class="d-inline" action="{{url('product',$p->id)}}"><input class="btn btn-danger text-white" type="submit" name="submit" value="Delete"></form> --}}
