@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5">EDIT ARTIKEL</h3>
        <hr class="line-seprate">
      </div>
    </div>
  </div>
</section>
<!-- SECTION BODY -->
<section class="statistic-chart">
  <div class="container">
    <form action="" method="post" class="row">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="id" value="{!! $data->id !!}">
      <div class="col-md-5">
        {{-- NAME --}}
        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
          <label class="form-control-label">Judul</label>
          <input type="text" name="name" placeholder="Isi Judul..." value="{{ old('name', $data->name) }}" class="form-control">
          @if ($errors->has('name'))
            <small class="form-text">{{ $errors->first('name') }}</small>
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
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-control-label">Status Aktif</div>
            <label class="switch switch-text switch-success mt-3">
              <input type="checkbox" class="switch-input" checked="true">
              <span data-on="On" data-off="Off" class="switch-label"></span>
              <span class="switch-handle"></span>
            </label>
          </div>
        </div>
        {{-- TAGS --}}
        {{-- <div class="form-group"> --}}
          <label for="multiple-select" class=" form-control-label">Kategori</label>
          <select name="multiple-select" id="multiple-select" multiple="" class="form-control">
            @foreach($tags as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
          </select>
        {{-- </div> --}}
      </div>
      <div class="col-md-7">
        {{-- IMAGES --}}
        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
          <label class="form-control-label">Foto Banner</label>
          <img src="{{asset('storage\images\\'.$data->image)}}" class="img-fluid mx-auto d-block mb-3" alt="">
          <input type="text" name="image" placeholder="image ke-" value="{{ old('image', $data->image) }}" class="form-control">
          @if ($errors->has('image'))
            <small class="form-text">{{ $errors->first('image') }}</small>
          @endif
        </div>
      </div>
    </form>
  </div>
</section>  
@endsection

@push('scripts')
<script>
  var setVal = {!!$data->tags!!};
  
  $(document).ready(function(){
    console.log(setVal[].id);
  });

  new SlimSelect({
    select: '#multiple-select'
  })
</script>
@endpush