@extends('admin.layout.dashboard')

<div class="container py-5 h-100">
<div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-md-12 col-xl-4">
    <div class="card" style="border-radius: 15px;">
        <div class="card-body text-center">
        <div class="mt-3 mb-4">
            <img  src="{{asset('/images/users/'.$user->user_img)}}"
            class=" rounded img-fluid" style="width: 200px;" />
        </div>
        <h3 class="mb-4">{{$user->name}}</h3>
        <p class="text-muted ">{{$user->author}}</p>
        <div class="mb-4 pb-2">
            <p class="lead">
            {{$user->email}}
            </p>
        </div>
        <a class="btn btn-outline-dark"
                style="z-index: 1;" href="{{url('/profile/'.$user->id.'/edit')}}">
                Edit profile
              </a>
        </div>
    </div>
    </div>
</div>
</div>