@extends('admin.layout.dashboard')
@section('table')
<div class="container py-5 h-100">
<div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-md-12 col-xl-4">
    

    <div class="card" style="border-radius: 15px;">
    
        <div class="card-body text-center">
            
        <div class="mt-3 mb-4">
            <img src="{{asset('/images/'.$book->img)}}"
            class=" img-fluid" style="width: 200px;" />
        </div>
        @unless($book->is_avilable)
        <span> Borrowed by: <div class="badge bg-dark text-white my-3" ><a class="link-light" href="{{$borrowed->user->name}}">{{$borrowed->user->name}}</div></a></span>
        <div class="mb-4"> Will be available in : {{$borrowed->return_date }}</div>                   
        @endunless
        <h3 class="mb-4">{{$book->name}}</h3>
        <p class="text-muted ">{{$book->author}}</p>
        <div class="mb-4 pb-2">
            <p class="lead">
            {{$book->descr}}
            </p>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection