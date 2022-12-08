@extends('layout.layout')


@section('content')


<h1 class="text-center">index of student</h1>
<div class="container">

    <table class="table">
        <thead>
            <tr>
      <th scope="col">ID</th>
      <th scope="col">name</th>
      <th scope="col">F name</th>
      <th scope="col">age</th>
      <th scope="col">email</th>
      <th scope="col">password</th>
      <th scope="col">Profile</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($st as $row)
    <tr>
        <th scope="row">{{$row->stid}}</th>
        <td>{{$row->stname}}</td>
        <td>{{$row->stfname}}</td>
        <td>{{$row->age}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->password}}</td>
        <td><img src="{{url('/')}}/images/{{$row->img}}" alt="" width="60"></td>
        <td>
            <a href="{{url('student/edit')}}/{{$row->stid}}" class="btn btn-primary">Edit</a>
            <a href="{{url('student/delete')}}/{{$row->stid}}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
    
</tbody>
</table>

</div>


@endsection
