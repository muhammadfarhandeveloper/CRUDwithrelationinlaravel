@extends('layout.layout')


@section('content')

<h1 class="text-center">index of Deparment</h1>
<div class="container">

    <table class="table">
        <thead>
            <tr>
      <th scope="col">ID</th>
      <th scope="col">Department</th>
      <th scope="col">Location</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dp as $row)
    <tr>
        <th scope="row">{{$row->did}}</th>
        <td>{{$row->dname}}</td>
        <td>{{$row->dlocation}}</td>
        <td>
            <a href="{{url('department/restore')}}/{{$row->did}}" class="btn btn-primary">Restore</a>
            <a href="{{url('department/deleteper')}}/{{$row->did}}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
    
</tbody>
</table>

</div>


@endsection
