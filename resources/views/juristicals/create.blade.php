@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5 text-uppercase">tambah produk hukum</h3>
        <hr class="line-seprate">
      </div>
    </div>
  </div>
</section>
<!-- SECTION BODY -->
<section class="statistic-chart">
  <div class="container">
    <form action="{{route('juristical.store')}}" method="post" class="row" enctype="multipart/form-data">
      {{csrf_field()}}
        <div class="col-lg-6">
          {{-- NAME --}}
          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
            <label class="form-control-label">Judul</label>
            <input type="text" name="name" placeholder="Isi Judul..." value="{{ old('name') }}" class="form-control">
            @if ($errors->has('name'))
              <small class="form-text text-danger">{{ $errors->first('name') }}</small>
            @endif
          </div>
          {{-- FILE --}}
          <div class="form-group pt-4{{ $errors->has('file') ? ' has-danger' : '' }}">
            <label class="form-control-label">File Lampiran</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <input 
                  type="file" 
                  class="custom-file-input" 
                  id="inputGroupFile01" 
                  name="file"
                  accept="application/msword, application/vnd.ms-powerpoint, application/pdf" 
                  aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label text-nowrap text-truncate" for="inputGroupFile01"></label>
              </div>
            </div>
            @if ($errors->has('image'))
              <small class="form-text text-danger">{{ $errors->first('image') }}</small>
            @endif
          </div>
          {{-- STATUS --}}
          <div class="form-group pt-4">
            <div class="form-control-label">Status Aktif</div>
            <label class="switch switch-text switch-success mt-3">
              <input id="poststatus" type="checkbox" name="active" class="switch-input" checked>
              <span data-on="On" data-off="Off" class="switch-label"></span>
              <span class="switch-handle"></span>
            </label>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label">Detail Produk :</label>
            <div id="body" style="background-color: #fff; height: 400px;"></div>
            <input type="hidden" name="detail">
          </div>
        </div>
        <div class="pt-5">
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
    });
  });

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
    $('input[name="detail"]').val(convert);
  });
</script>
@endpush