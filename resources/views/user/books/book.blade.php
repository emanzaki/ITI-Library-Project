@extends('layouts.app')
@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<body class="sb-nav-fixed">
        <div class="container py-5 h-100">
<div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-md-12 col-xl-4">

    <div class="card" style="border-radius: 15px;">
        <div class="card-body text-center">
        <div class="mt-3 mb-4">
            <img src="{{asset('/images/'.$book->img)}}"
            class=" img-fluid" style="width: 200px;" />
        </div>
        <h3 class="mb-2">{{$book->name}}</h3>
        <p class="text-muted mb-4">{{$book->author}}</p>
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
        
    </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
@endsection
