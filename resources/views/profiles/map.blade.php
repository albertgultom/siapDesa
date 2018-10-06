@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title-5">Edit Map</h3>
              <hr class="line-seprate">
            </div>
          </div>
        </div>
        </section>
      <br>
<!-- SECTION BODY -->
<div class="container">
  <form action="{{route('profile.store')}}" class="row" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  {{-- <input type="hidden" name="_method" value="PATCH"/> --}}
  <div class="col-md-12">
    <div class="form-group{{ $errors->has('map') ? ' has-danger' : '' }}">
      <label class="form-control-label">Foto Map</label>
      
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputFileAddon01">Upload</span>
        </div>
          <div class="custom-file">
            <input
              type="file" 
              class="custom-file-input" 
              id="inputFile01" 
              name="map"
              accept="image/png, image/jpeg, image/jpeg"
              aria-describedby="inputFileAddon01">
            <label class="custom-file-label" for="inputFile01">{!! $edit->map !!}></label>
          </div>
          
          @if ($errors->has('map'))
            <small class="form-text text-danger">{{ $errors->first('map') }}</small>
          @endif
          
        </div>
        <img id="imageFile01" src="{{asset('storage\images\\'.$edit->map)}}" class="img-fluid mx-auto d-block mb-3" alt="">
      </div>
      <div > 
          <button type="submit" class="btn btn-outline-primary">Save</button>
          </div>
    </div>

  
  </form>
       
</div>
        


@endsection

@push ('scripts')
<script>
  $(document).ready(function(){
    $('input[type="file"]').change(function(e) {
      var filename = e.target.files[0].name;
      $('.custom-file-label').text(filename);

      var reader = new FileReader();
      reader.onload = function (e) {
        $('#imageFile01').attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
    });
  });
</script>
@endpush