@if($errors->any())

    @foreach($errors->all() as $err)
        {{-- <div class="alert alert-danger"> --}}
            <p class="my-1 alert alert-danger"> {{$err}} </p>
        {{-- </div> --}}
    @endforeach

@endif