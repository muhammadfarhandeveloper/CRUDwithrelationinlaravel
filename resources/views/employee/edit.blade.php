@extends('layout.layout')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="offset-md-3 col-md-6">

            <form action="{{url('employee/update')}}/{{$emp[0]->eid}}" method="post" enctype="multipart/form-data"> 

                @csrf
                <input type="text" name="name" placeholder="enter Name" value="{{$emp[0]->name}}" class="form-control">
                @error('name')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>
                <input type="text" name="email" placeholder="enter Email Name" value="{{$emp[0]->email}}" class="form-control">
                @error('email')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>
                <input type="number" name="age" placeholder="enter Age" value="{{$emp[0]->age}}" class="form-control">
                @error('age')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>

                <select name="dname" class="form-select">

                  <option value="">---- Select ----- </option>
                  @foreach ($dp as $item)

                     <option value="{{$item->did}}" 
                        @if ($item->did == $emp[0]->did)
                            selected
                     @endif 
                     > {{$item->dname}}</option>
                  @endforeach

                </select>

                
                <br>
                <button type="submit" class="btn btn-primary">Update</button>

            </form>


        </div>
    </div>
</div>



    
@endsection