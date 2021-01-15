@extends('layouts.app')
@section('content')

        <div class="horscrol">
            <div class="horscroldiv">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" scope="">#</th>
                            <th class="text-center" scope="">{{__('messages.Name')}}</th>
                            <th class="text-center" scope="">{{__('messages.Category')}}</th>
                            <th class="text-center" scope="">{{__('messages.Price')}}</th>
                            <th class="text-center" scope="">{{__('messages.Quantity')}}</th>
                            <th class="text-center" scope="">{{__('messages.Image')}}</th>
                            <th class="text-center" scope="">{{__('messages.Description')}}</th>
                            @auth
                            <th scope="" class="text-center">{{__('messages.Operations')}}</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $p)
                            <tr>
                                <th scope="">{{$p->id}}</th>

                                @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                    <td class="font-weight-bold text-center text-primary"><a href="{{url('product',$p->id)}}">{{$p->name_ar}} </a></td>
                                    <td class="font-weight-bold text-center text-danger">{{$p->category->name_ar}}</td>
                                @else
                                    <td class="font-weight-bold text-center text-primary"><a href="{{url('product',$p->id)}}">{{$p->name_en}} </a></td>
                                    <td class="font-weight-bold text-center text-danger">{{$p->category->name_en}}</td>
                                @endif

                                <td class="font-weight-bold text-center text-secondary">{{$p->price}} LE</td>
                                <td class="font-weight-bold text-center text-primary">{{$p->quantity}}</td>
                                @if($p->img !== null)
                                    <td class="font-weight-bold text-center"><a href="{{url('product',$p->id)}}" class="btn btn-info p-0"><img src="{{asset('images/'.$p->img)}}"  width="90" height="90"></a></td>
                                @endif
                                @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                <td class="font-weight-bold text-center text-muted"> <?=  Str::substr($p->description_ar,1 ,30)." ..." ?></td>
                                @else
                                <td class="font-weight-bold text-center text-muted"> <?=  Str::substr($p->description_en,1 ,30)." ..." ?></td>
                                @endif
                                @auth
                                    <td class="row text-center">
                                        <a href="{{url('product',$p->id)}}" class="btn text-center btn-info mx-1">{{__('messages.Show')}}</a>
                                        <a href="{{route('product.edit',$p->id)}}" class="btn text-center  mx-1 btn-secondary">{{__('messages.Edit')}}</a>
                                        <form action="{{route('product.destroy',$p->id)}}" method="POST" >
                                            @method("DELETE")
                                            @csrf
                                            <input href="{{route('product.destroy',$p->id)}}" type="submit" class="btn text-center  mx-1 btn-danger" value="{{__('messages.Delete')}}">
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
            {{-- {!! $products->render() !!} --}}
        </p>


@endsection

{{-- <form method="DELETE" class="d-inline" action="{{url('product',$p->id)}}"><input class="btn btn-danger text-white" type="submit" name="submit" value="Delete"></form> --}}
