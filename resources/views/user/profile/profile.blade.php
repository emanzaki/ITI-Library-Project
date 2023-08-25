@extends('layouts.app')
<section class="h-100 gradient-custom-2">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="">
        <div class="">
          <div class="rounded-top text-white d-flex flex-row" style="height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
            @if(isset($user->user_img))
              <img src="{{asset('/images/users/'.$user->user_img)}}"
                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px; z-index: 1">
            @else
            <img src="{{asset('/images/users/user.jpg')}}"
                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px; z-index: 1">
              @endif
              <p class="mb-1 p-2 h5"
                style="z-index: 1; color:222;">
                {{$user->name}}
              </p>
              <a class="btn btn-outline-dark"
                style="z-index: 1;" href="{{url('/profile/'.$user->id.'/edit')}}">
                Edit profile
              </a>
            </div>
          </div>
          <div class="p-4 text-black" style="background-color: #f8f9fa;">
            <div class="d-flex justify-content-end text-center py-1">
              <div>
                <p class="mb-1 h5">{{count($borrowed)}}</p>
                <p class="small text-muted mb-0">books</p>
              </div>
            </div>
          </div>
          <div class="card card-body p-4 m-4 text-black">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0">Recent Books</p>
            </div>
            <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($borrowed as $book)
                    <div class="col mb-5">
                        <div class="card container-custom h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" >{{$book->book->name}}</div>
                            <!-- Product image-->
                            <img class="card-img-top custom-image" src="{{ asset('images/'.$book->book->img) }}" alt="{{$book->book->name}}">
                            <!-- Product details-->
                            <div class="card card-img-overlay-custom h-100">
                            <div class="card-body p-4">
                            </div> 
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                
                            <form method="POST" action="/borrow/{{$book->book->id}}/return">
                                @method('DELETE')
                                @csrf
                                <button class="text-center btn btn-danger mt-3">Return</button>
                            </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>