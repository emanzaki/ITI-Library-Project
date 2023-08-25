@extends('admin.layout.dashboard')

@section('table')
<div class="container-fluid px-4">
    <h1 class="mt-4">Library Dashboard</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Users Table
        </div>

        <div class="card-body">
        <input type="text" id="myInput" class="rounded form-control " onkeyup="myFunctionn()" placeholder="Search for IDs.." title="Type in a ID">
            <table id="myTable" class="table table-striped ">
                <thead class="header">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Joined at</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                    <td >{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    @if($user->role===1)
                    <td style="color:red">Admin</td>
                    <td style="color:red">-</td>
                    @else
                    <td>Student</td>
                    <td><a class="btn btn-primary" href="{{url('/users/'.$user->id)}}">View</a></td>
                    @endif
                    
                    </tr>
                    @endforeach
                    

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function myFunctionn() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0]; // Change the index to match the ID column
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
@endsection