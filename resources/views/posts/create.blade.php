@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5">BUAT ARTIKEL</h3>
        <hr class="line-seprate">
      </div>
    </div>
  </div>
</section>
<!-- SECTION BODY -->
<section class="statistic-chart">
  <div class="container">
    <form action="{{route('post.store')}}" method="post" class="row" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="col-md-6">
        {{-- NAME --}}
        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
          <label class="form-control-label">Judul</label>
          <input type="text" name="name" placeholder="Isi Judul..." value="{{ old('name') }}" class="form-control">
          @if ($errors->has('name'))
            <small class="form-text text-danger">{{ $errors->first('name') }}</small>
          @endif
        </div>
        {{-- TYPE & STATUS --}}
        <div class="row">
          <div class="form-group col-md-6">
            <label class="form-control-label">Tipe</label>
            <div class="select">
              <select name="type_id" class="form-control">
                <option selected disabled value="">Pilih Tipe</option>
                @foreach ($types as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
              @if ($errors->has('type_id'))
                <small class="form-text text-danger">{{ $errors->first('type_id') }}</small>
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-control-label">Status Aktif</div>
            <label class="switch switch-text switch-success mt-3">
              <input id="poststatus" type="checkbox" name="active" class="switch-input" checked>
              <span data-on="On" data-off="Off" class="switch-label"></span>
              <span class="switch-handle"></span>
            </label>
          </div>
        </div>
        {{-- TAGS --}}
        <label for="multiple-select" class=" form-control-label">Kategori</label>
        <select name="tags[]" id="multiple-select" multiple="" class="">
          @foreach($tags as $item)
            <option value="{{$item->id}}">{!! $item->name !!}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        {{-- IMAGES --}}
        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
          <label class="form-control-label">Foto Banner</label>
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
      <div class="col-md-12">
        <div class="form-group">
          <label class="form-control-label">Isi Artikel :</label>
          <div id="body" style="background-color: #fff; height: 400px;"></div>
          <input type="hidden" name="body">
        </div>
      </div>
      <button type="submit" class="btn btn-outline-primary">Simpan</button>
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

  var multi = new SlimSelect({
    select: '#multiple-select'
  })

  var quill = new Quill('#body',{
    modules: {
      toolbar: QuilljsToolbarOptions,
    },
    theme: 'snow',
    placeholder: '...'
  });

  $('form').submit(function(e){
    cfg = {};
    cek = quill.getContents().ops;
    convert = new QuillDeltaToHtmlConverter(cek, cfg).convert();
    $('input[name="body"]').val(convert);
  });
</script>
@endpush