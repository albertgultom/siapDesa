@extends('layouts.dashboard')

@section('content')

<div class="row">
    <div class="col-md-12">
        <br/>
            <h3>Edit</h3>
        <br/>
        <div class="container">
        <form action="{{route('type.update',$edit->id)}}" method="post">
                {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH"/>
            <input type="text" name="name" 
            class="form-control col-md-6" value="{{$edit->name}}" placeholder="Enter name"
            />
            <br>
            <input type="text" name="level" 
            class="form-control col-md-6" value="{{$edit->level}}" placeholder="Enter name"
            />
            <br>
            <input type="submit" class="btn btn-primary" value="save"/>
        </form>
        </div>
    </div>
</div>


@endsection