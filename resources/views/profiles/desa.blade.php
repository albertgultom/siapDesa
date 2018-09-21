@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title-5">Edit Desa</h3>
              <hr class="line-seprate">
            </div>
          </div>
        </div>
        </section>
      <br>
<!-- SECTION BODY -->
<div class="container">
  <div >
    <div class="col-md-12" class="row">
            <form action="{{route('profile.update',$edit->id)}}" class="row" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH"/>
            
            <div class="col-md-6">
                <label class="form-control-label">Edit Desa</label>
                <input type="text" name="name"  value="{{$edit->name}}"  class="form-control"/>
            </div>
            <div class="col-md-6" >
                <label class="form-control-label">Edit Kecamatan </label>
                <input type="text" name="subdistrict"  value="{{$edit->subdistrict}}" class="form-control "/>
            </div>
            <div  class="col-md-6">
                <label class="form-control-label">Edit Kabupaten </label>
                <input type="text" name="district"  value="{{$edit->district}}" class="form-control "/>
            </div>
            <div class="col-md-6" >
                <label class="form-control-label">Edit Kota </label>
                <input type="text" name="province"  value="{{$edit->province}}" class="form-control "/>
            </div>
            <div class="col-md-6" >
                <label class="form-control-label">Edit Kode Pos </label>
                <input type="text" name="zip_code"  value="{{$edit->zip_code}}" class="form-control"/>
            </div>
            <div class="col-md-6" >
                <label class="form-control-label">Edit Nomor Telepon </label>
                <input type="text" name="phone"  value="{{$edit->phone}}" class="form-control "/>
            </div>
            <div class="col-md-6" >
                <label class="form-control-label">Edit Email </label>
                <input type="text" name="email"  value="{{$edit->email}}" class="form-control "/>
            </div>
            <div class="col-md-12">
              <div class="form-group{{ $errors->has('image_profile') ? ' has-danger' : '' }}">
                <label class="form-control-label">Foto Desa</label>
                <img id="imageFile01" src="{{asset('storage\images\\'.$edit->image_profile)}}" class="img-fluid mx-auto d-block mb-3" alt="">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputFileAddon01">Upload</span>
                    </div>
                      <div class="custom-file">
                        <input
                          type="file" 
                          class="custom-file-input" 
                          id="inputFile01" 
                          name="image_profile"
                          accept="image/png, image/jpeg, image/jpeg"
                          aria-describedby="inputFileAddon01">
                        <label class="custom-file-label" for="inputFile01">{!! $edit->image_profile !!}></label>
                      </div>
                    </div>
                    @if ($errors->has('image_profile'))
                      <small class="form-text text-danger">{{ $errors->first('image_profile') }}</small>
                    @endif
                  </div>
              </div>
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="save"/>
            </form>
        </div>
    </div>
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