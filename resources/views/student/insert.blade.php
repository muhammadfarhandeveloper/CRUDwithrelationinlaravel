@extends('layout.layout')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="offset-md-3 col-md-6">

            <form action="{{url('student/store')}}" method="post" enctype="multipart/form-data"> 

                @csrf
                <input type="text" name="name" placeholder="enter Name" class="form-control">
                @error('name')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>
                <input type="text" name="fname" placeholder="enter Father Name" class="form-control">
                @error('fname')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>
                <input type="number" name="age" placeholder="enter Age" class="form-control">
                @error('age')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>
                <input type="email" name="email" placeholder="enter Email" class="form-control">
                @error('email')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>
                <input type="password" name="password" placeholder="enter Password" class="form-control">
                @error('password')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>
                <input type="file" name="img" class="form-control">
                @error('img')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>
                <button type="submit" class="btn btn-primary">Insert</button>

            </form>


        </div>
    </div>
</div>



    
@endsection