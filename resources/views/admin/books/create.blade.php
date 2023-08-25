@extends('admin.layout.dashboard')
@section('table')
<div class="container-fluid px-4">
    <h1 class="mt-4">Add</h1>
    <form class="p-4 rounded" action="{{ url('/books') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="descr" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Add Book image</label>
            <input type="file" class="form-control" name="img">
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger mt-3" role="alert">
            {{ $error }}
        </div>
        @endforeach
        @endif
    </form>
@endsection