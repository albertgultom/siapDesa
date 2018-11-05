@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5">EDIT GALLERY <span style="text-transform: uppercase;">{{$request_content}}</span></h3>
        <hr class="line-seprate">
      </div>
    </div>
  </div>
</section>
<!-- SECTION BODY -->
<section class="statistic-chart">
  <div class="container">
    <form action="{{route('gallery.update', $data->id)}}" method="post" class="row" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="PUT">      
      <input type="hidden" name="content" value="{{$request_content}}">
      <div class="col-md-6">
        {{-- NAME --}}
        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
          <label class="form-control-label">Judul</label>
          <input type="text" name="name" placeholder="Isi Judul..." value="{{ old('name', $data->name) }}" class="form-control">
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
                  <option {{ $data->type_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
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
      </div>
      <div class="col-lg-6">
        {{-- TAGS --}}
        <label for="multiple-select" class=" form-control-label">Kategori</label>
        <select name="tags[]" id="multiple-select" multiple="" class="">
          @foreach($tags as $item)
          <option 
              value="{{$item->id}}" 
              {{
                collect($data->tags)
                  ->pluck('name')
                  ->contains($item->name) == 1 ? 'selected' : ''
              }}>{!! $item->name !!}</option>
          @endforeach
        </select>      
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-outline-primary">Simpan</button>        
      </div>

    </form>
  </div>
</section>  

<!-- SECTION content -->
<section class="statistic-chart">
  <div class="container">
    <div class="row">
    @if($data_detail)
    @for($i=0;$i < count($data_detail['contents']);$i++)
        @if($data_detail['content'] == 'photo')
        <a href="#" class="col-12 col-lg-3 mb-2 d-flex align-items-stretch">
            <div class="card features">
              <img class="card-img-top img-fluid" src="{{asset('storage/photos/'.$data_detail['contents'][$i]->image)}}" alt="Card image cap">
              <div class="card-body">
                <div class="media">
                  <div class="media-body">
                      <h4 class="card-title">{{$data_detail['contents'][$i]->name}}</h4>
                  </div>
                </div>
              </div>
            </div>
          </a>
        @elseif ($data_detail['content'] == 'video')
        <a href="#" class="col-12 col-lg-3 mb-2 d-flex align-items-stretch">
            <div class="card features col-lg-12">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{$data_detail['contents'][$i]->video}}" allowfullscreen=""></iframe>
              </div>
              <div class="card-body">
                <div class="media">
                  <div class="media-body">
                      <h4 class="card-title">{{$data_detail['contents'][$i]->name}}</h4>
                  </div>
                </div>
              </div>
            </div>
          </a>        
        @endif
    @endfor
    @endif    
    </div>
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