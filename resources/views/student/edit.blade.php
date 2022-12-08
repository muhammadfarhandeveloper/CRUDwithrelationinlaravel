@extends('layout.layout')

@section('content')

<h1 class="text-center">Edit Student</h1>
<div class="container mt-5">
    <div class="row">
        <div class="offset-md-3 col-md-6">

            <form action="{{url('student/update')}}/{{$st['stid']}}" method="post" enctype="multipart/form-data"> 

                @csrf
                <input type="text" name="name" placeholder="enter Name" value="{{$st['stname']}}" class="form-control">
                @error('name')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>
                <input type="text" name="fname" placeholder="enter Father Name" value="{{$st['stfname']}}" class="form-control">
                @error('fname')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>
                <input type="number" name="age" placeholder="enter Age" class="form-control" value="{{$st['age']}}">
                @error('age')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>
                <input type="email" name="email" placeholder="enter Email" class="form-control" value="{{$st['email']}}">
                @error('email')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>

                <input type="file" name="img" class="form-control">
                @error('img')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>
                <input type="hidden" name="oldimg" value="{{$st['img']}}">
                <img src="/images/{{$st['img']}}" alt="" width="80px">
                <br><br>
                <button type="submit" class="btn btn-primary">Update</button>

            </form>


        </div>
    </div>
</div>



    
@endsection