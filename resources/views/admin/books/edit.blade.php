@extends('admin.layout.dashboard')
@section('table')
<div class="container-fluid px-4">
    <form class="p-4 rounded" action="{{ url('/books/'.$book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value={{$book->name}} >
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" required value={{$book->author}}>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="descr" rows="4" required>{{$book->descr}}</textarea>
        </div>
        <div class="mb-3">
        <label for="img" class="form-label">Current Image:</label>
        <img src="{{ asset('images/' . $book->img) }}" alt="Book Image" width="100">
    </div>
    <div class="mb-3">
        <label for="img" class="form-label">New Image:</label>
        <input type="file" class="form-control" id="img" name="img">
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger mt-3" role="alert">
            {{ $error }}
        </div>
        @endforeach
        @endif
    </form>
</div>
@endsection