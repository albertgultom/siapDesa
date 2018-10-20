@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5">BUAT GALLERY <span style="text-transform: uppercase;">{{$request_content}}</span></h3>
        <hr class="line-seprate">
      </div>
    </div>
  </div>
</section>
<!-- SECTION BODY -->
<section class="statistic-chart">
  <div class="container">
    <form action="{{route('gallery.store_content')}}" method="post" class="row" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="content" value="{{$request_content}}">
      <input type="hidden" name="gallery_id" value="{{$id}}">

    <div class="col-md-12">
        {{-- NAME --}}
        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
          <label class="form-control-label">Nama</label>
          <input type="text" name="name" placeholder="Isi Judul..." value="{{ old('name') }}" class="form-control">
          @if ($errors->has('name'))
            <small class="form-text text-danger">{{ $errors->first('name') }}</small>
          @endif
        </div>
    </div>


    @if ($request_content == 'video')
    <div class="col-md-12">
        {{-- NAME --}}
        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
          <label class="form-control-label">Link Video</label>
          <input type="text" name="video" placeholder="Link video..." value="{{ old('video') }}" class="form-control">
          @if ($errors->has('video'))
            <small class="form-text text-danger">{{ $errors->first('video') }}</small>
          @endif
        </div>
    </div>      
    @endif            

      @if ($request_content == 'photo')
      <div class="col-md-12">
        {{-- IMAGES --}}
        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
          <label class="form-control-label">Upload <span style="text-transform: lowercase;">{{$request_content}}</span></label>
          <img id="imageFile01" src="{{asset('storage\images\no-img.png')}}" class="img-fluid mx-auto d-block mb-3" alt="">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
              <input 
                type="file" 
                class="custom-file-input" 
                id="inputGroupFile01" 
                name="image"
                accept="image/png, image/jpeg" 
                aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01"></label>
            </div>
          </div>
          @if ($errors->has('image'))
            <small class="form-text text-danger">{{ $errors->first('image') }}</small>
          @endif
        </div>
      </div>
      @endif      

      <div class="col-md-12">
        <button type="submit" class="btn btn-outline-primary">Simpan</button>        
      </div>

    </form>
  </div>
</section>  
@endsection

@push('scripts')
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

//   var multi = new SlimSelect({
//     select: '#multiple-select'
//   })

//   var quill = new Quill('#body',{
//     modules: {
//       toolbar: QuilljsToolbarOptions,
//     },
//     theme: 'snow',
//     placeholder: '...'
//   });

  $('form').submit(function(e){
    cfg = {};
    cek = quill.getContents().ops;
    convert = new QuillDeltaToHtmlConverter(cek, cfg).convert();
    $('input[name="body"]').val(convert);
  });
</script>
@endpush