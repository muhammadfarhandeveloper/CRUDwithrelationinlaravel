@extends('layout.layout')


@section('content')


<h1 class="text-center">index of Deparment</h1>

    

<div class="container"> 
    
    <div class="row">

        <div class="col-md-5">
            <a href="{{url('/department/insert')}}">
                <button class="btn btn-primary">Add Department</button>
            </a>
            <a href="{{url('/department/trashdata')}}">
                <button class="btn btn-primary">Trash data</button>
            </a>


        </div>

    </div>
<br><br>

@if(session()->has('status'))
    
    <div class="alert alert-success" role="alert">
        {{session()->get('status')}}
      </div>

@endif


<br>

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
            <a href="{{url('department/edit')}}/{{$row->did}}" class="btn btn-primary">Edit</a>
            <a href="{{url('department/delete')}}/{{$row->did}}" class="btn btn-danger">Move Trash</a>
        </td>
    </tr>
    @endforeach
    
</tbody>
</table>

</div>


@endsection
