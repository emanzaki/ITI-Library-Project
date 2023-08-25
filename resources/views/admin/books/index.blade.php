@extends('admin.layout.dashboard')
@section('table')
<div class="container-fluid px-4">
    <h1 class="mt-4">Library Dashboard</h1>
    <form class="container" action="{{ url('/books/create') }}" method="GET">
    <button type="submit" class="btn btn-dark mb-3">Add Book</button>
    </form>
    <div class="card mb-4">
        
                    
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Available Books
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
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product price-->
                                    @if($book->is_avilable)
                                    <span style="color:lightgreen;">available</span>
                                    @else
                                    <div class="text-decoration-line-through" style="color:red;">available</div>
                                    @endif
                                </div>
                            </div> 
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-primary mt-3" href="/books/{{$book->id}}">View</a></div>
                                <div class="text-center"><a class="btn btn-light mt-3" href="/books/{{$book->id}}/edit">Edit</a></div>
                            <form method="POST" action="/books/{{$book->id}}">
                                @method('DELETE')
                                @csrf
                                <button class="text-center btn btn-danger mt-3">Delete</button>
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
@endsection