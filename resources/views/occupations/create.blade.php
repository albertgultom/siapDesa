@extends('layouts.dashboard')

@section('content')

<div class="row">
    <div class="col-md-12">
        
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($error->all as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(\Session::has('success'))
        <div class="alert alert-success">
        <p>{{\Session::get('success')}}</p>
        </div>
        @endif

        <div class="container">
        <form method="post" action="{{url('occupation')}}" >
            {{csrf_field()}}    
            <div class="form-group col-md-6" >
                <br/>
                <h3 align="left">Tambah Pekerjaan</h3>
                <br/>
                <input type="text" name="name" class="form-control" placeholder="Pekerjaan"/>    
            </div>

            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-outline-primary"> Save </button>
            </div>

            
        </form>
        </div>
    </div>
</div>
@endsection