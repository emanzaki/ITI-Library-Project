@extends('layouts.app')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<body class="sb-nav-fixed">
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="text-center text-white">
                    <h6 class="display-6 fw-bolder">“A reader lives a thousand lives before he dies . . . The man who never reads lives only one.”</h6>
                    <p class="lead fw-normal text-white-50 mb-0" ><i>'George R.R. Martin'</i></p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <div class="card mb-4">
        <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table"></i>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <a  class="btn btn-secondary" name="options" id="option1" autocomplete="off" href="/filter/books" >
                    borrowed books
                </a>
            </div>
        </div>
        <section class="py-5">
            
            <div class="container px-4 px-lg-5 mt-5">
                
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                    @foreach ($books as $book)
                    <div class="col mb-5">
                        <div class="card container-custom h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" >{{$book->name}}</div>
                            <!-- Product image-->
                            <img class="card-img-top custom-image" src="{{ asset('images/'.$book->img) }}" alt="{{$book->name}}">
                            <!-- Product details-->
                            <div class="card card-img-overlay-custom h-100">
                            @if($book->is_avilable)
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product price-->
                                    <div class=" pt-5" style="color:lightgreen;">available</div>
                                </div>
                            </div> 
                            <!-- Product actions-->
                            <form action="/borrow" class="card-footer p-4 pt-0 border-top-0 bg-transparent" method="POST">
                                @csrf
                                <a class="text-center btn btn-primary mt-3" href="/book/{{$book->id}}"> View</a>
                                <button class="text-center btn btn-primary mt-3 " type="submit">Borrow</button>
                                <input hidden value= "{{ Auth::user()->id }}" name="user_id">
                                <input hidden value= "{{$book->id}}" name="book_id">
                            </form>
                            </div>
                            @else
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product price-->
                                    <div class="text-decoration-line-through pt-5" style="color:red;">available</div>
                                </div>
                            </div> 
                            <!-- Product actions-->
                            
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <a class="text-center btn btn-primary mt-3" href="/book/{{$book->id}}"> View</a>
                                <button class="text-center btn btn-secondary mt-3" disabled> Borrow</button>
                            </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
<!-- Footer-->
<footer class="py-5 bg-dark">
<div class="container"><p class="m-0 text-center text-white">Copyright &copy; Library 2023</p></div>
</footer>
<!-- Bootstrap core JS-->