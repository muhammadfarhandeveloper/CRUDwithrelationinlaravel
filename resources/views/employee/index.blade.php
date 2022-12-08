@extends('layout.layout')


@section('content')


<h1 class="text-center">index of Employee</h1>
<div class="container">

    <table class="table">
        <thead>
            <tr>
      <th scope="col">ID</th>
      <th scope="col">name</th>
      <th scope="col">Email</th>
      <th scope="col">age</th>
      <th scope="col">Department</th>
      <th scope="col">D Location</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($emp as $row)
    <tr>
        <th scope="row">{{$row->eid}}</th>
        <td>{{$row->name}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->age}}</td>
        <td>{{$row->dname}}</td>
        <td>{{$row->dlocation}}</td>
        <td>
            <a href="{{url('employee/edit')}}/{{$row->eid}}" class="btn btn-primary">Edit</a>
            <a href="{{url('employee/delete')}}/{{$row->eid}}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
    
</tbody>
</table>

</div>


@endsection
