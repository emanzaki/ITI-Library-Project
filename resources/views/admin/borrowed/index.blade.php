@extends('admin.layout.dashboard')
@section('table')
<div class="container-fluid px-4">
<h1 class="mt-4">Library Dashboard</h1>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Recent books borrowed
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">UserID</th>
                <th scope="col">User name</th>
                <th scope="col">User email</th>
                <th scope="col">Book name</th>
                <th scope="col">Borrow date</th>
                <th scope="col">Return date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrows as $borrow)
                <tr>
                <th scope="row">{{$borrow->user->id}}</th>
                <td>{{$borrow->user->name}}</td>
                <td>{{$borrow->user->email}}</td>
                <td>{{$borrow->book->name}}</td>
                <td>{{$borrow->borrow_date}}</td>
                <td>{{$borrow->return_date}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection