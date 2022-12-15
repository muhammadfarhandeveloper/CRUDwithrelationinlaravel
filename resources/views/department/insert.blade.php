@extends('layout.layout')

@section('content')



<div class="container mt-5">
    <div class="row">
        <div class="offset-md-3 col-md-6">

            <form action="{{url('department/store')}}" method="post" enctype="multipart/form-data"> 

                @csrf
                <input type="text" name="dname" placeholder="enter department Name" class="form-control">
                @error('dname')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>
                <input type="text" name="dlocation" placeholder="enter department Location " class="form-control">
                @error('department')
                   <p class="text-danger">{{$message}}</p> 
                @enderror
                <br>
                <button type="submit" class="btn btn-primary">Insert</button>

            </form>


        </div>
    </div>
</div>



    
@endsection