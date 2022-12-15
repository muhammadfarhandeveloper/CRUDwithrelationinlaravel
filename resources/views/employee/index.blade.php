@extends('layout.layout')


@section('content')

@if (session()->has('email'))
{{session()->get('email')}}
@else
<p>Guest</p>
@endif

    

<h1 class="text-center">index of Employee</h1>
<br><br>
<div class="container">
    <div class="row">
        <a href="{{url('employee/insert')}}">
            <button class="btn btn-primary">Add Employee</button>
        </a>
        <div class="offset-md-3 col-md-3">
            <form action="">

                <div class="input-group">
                    <input type="search" name="search" value="{{$search}}" placeholder="Searching...." class="form-control" />
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>

                <select name="sort" id="" class="form-select">
                    <option value="asc">A to Z</option>
                    <option value="desc">Z to A</option>
                </select>
                
            </form>
        </div>
    </div>
</div>

<br><br>

<div class="container">

    @if(session()->has('status'))

    <div class="alert alert-success" role="alert">
        {{session()->get('status')}}
    </div>

        @endif

        {{session()->get('name')}}

    


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


<div class="row">

    {{$emp->links()}}

    <p>{{$emp->total()}}</p>
    <p>{{$emp->currentpage()}}</p>

</div>

<style>
    .w-5{
        display: none;
    }
</style>

@endsection
