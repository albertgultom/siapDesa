@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title-5">Edit Visi dan Misi</h3>
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
            <form action="" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH"/>
            <input type="text" name="name" class="form-control col-md-6" value="" placeholder="Enter name"/>
            <br>
            <input type="text" name="subdistrict" class="form-control col-md-6" value="" placeholder="Enter name"/>
            <br>
            <input type="submit" class="btn btn-primary" value="save"/>
            </form>
        </div>
    </div>
  </div>
@endsection