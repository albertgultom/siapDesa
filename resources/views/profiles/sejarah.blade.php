@extends('layouts.dashboard')
@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title-5">Sejarah</h3>
              <hr class="line-seprate">
            </div>
          </div>
        </div>
        </section>
      <br>
<!-- SECTION BODY -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{route('profile.update',$edit->id)}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH"/>
            <textarea rows="4" cols="50" name="history"  class="form-control col-md-6" >{{$edit->history}}</textarea>
            <br>
            <input type="submit" class="btn btn-primary" value="Save"/>
            </form>
        </div>
    </div>
  </div>
@endsection