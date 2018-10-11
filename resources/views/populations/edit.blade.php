@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5">EDIT PENDUDUK</h3>
        <hr class="line-seprate">
      </div>
    </div>
  </div>
</section>
<!-- SECTION BODY -->
<section class="statistic-chart">
    <div class="container">
        <form action="{{route('population.update', $data->id)}}" method="post" class="row" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
            <div class="col-md-6">
                {{-- NIK --}}
                <div class="form-group{{ $errors->has('nik') ? ' has-danger' : '' }}">
                    <label class="form-control-label">NIK</label>
                    <input type="text" name="nik" placeholder="NIK" value="{{ old('nik', $data->nik) }}" class="form-control">
                    @if ($errors->has('nik'))
                        <small class="form-text text-danger">{{ $errors->first('nik') }}</small>
                    @endif
                </div>

                {{-- NAME --}}
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label">Nama</label>
                    <input type="text" name="name" placeholder="Nama" value="{{ old('name', $data->name) }}" class="form-control">
                    @if ($errors->has('name'))
                        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>                

                <div class="form-group">
                    <label class="form-control-label">Jenis Kelamin</label>
                    <div class="select">
                        <select name="gender" class="form-control">
                            <option selected disabled value="">Pilih Jenis Kelamin</option>
                            @foreach ($gender as $item)
                            <option {{ $data->gender == $item['id'] ? 'selected' : '' }} value="{{ $item['id'] }}">{{ $item['name'] }}</option>                            
                            @endforeach
                        </select>
                        @if ($errors->has('gender'))
                            <small class="form-text text-danger">{{ $errors->first('gender') }}</small>
                        @endif
                    </div>
                </div>

                {{-- birthplace --}}
                <div class="form-group{{ $errors->has('birthplace') ? ' has-danger' : '' }}">
                    <label class="form-control-label">Tempat Lahir</label>
                    <input type="text" name="birthplace" placeholder="Tempat Lahir" value="{{ old('birthplace', $data->birthplace) }}" class="form-control">
                    @if ($errors->has('birthplace'))
                        <small class="form-text text-danger">{{ $errors->first('birthplace') }}</small>
                    @endif
                </div>                                                

                {{-- birthdate --}}
                <div class="form-group{{ $errors->has('birthdate') ? ' has-danger' : '' }}">
                    <label class="form-control-label">Tanggal Lahir</label>
                    <input type="text" name="birthdate" placeholder="Tanggal Lahir" value="{{ old('birthdate', $data->birthdate) }}" class="form-control">
                    @if ($errors->has('birthdate'))
                        <small class="form-text text-danger">{{ $errors->first('birthdate') }}</small>
                    @endif
                </div>                                                                

                {{-- bloodtype --}}
                <div class="form-group{{ $errors->has('bloodtype') ? ' has-danger' : '' }}">
                    <label class="form-control-label">Golongan Darah</label>
                    <input type="text" name="bloodtype" placeholder="Golongan Darah" value="{{ old('bloodtype', $data->bloodtype) }}" class="form-control">
                    @if ($errors->has('bloodtype'))
                        <small class="form-text text-danger">{{ $errors->first('bloodtype') }}</small>
                    @endif
                </div>

            </div>
            <div class="col-md-6">
            <div class="form-group">
                    <label class="form-control-label">Agama</label>
                    <div class="select">
                        <select name="religion" class="form-control">
                            <option selected disabled value="">Pilih Agama</option>
                            @foreach ($religion as $item)
                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                            <option {{ $data->religion == $item['id'] ? 'selected' : '' }} value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('religion'))
                            <small class="form-text text-danger">{{ $errors->first('religion') }}</small>
                        @endif
                    </div>
                </div>                                                

                <div class="form-group">
                    <label class="form-control-label">Status</label>
                    <div class="select">
                        <select name="status" class="form-control">
                            <option selected disabled value="">Pilih Status</option>
                            @foreach ($status as $item)
                            <option {{ $data->status == $item['id'] ? 'selected' : '' }} value="{{ $item['id'] }}">{{ $item['name'] }}</option>                            
                            @endforeach
                        </select>
                        @if ($errors->has('status'))
                            <small class="form-text text-danger">{{ $errors->first('status') }}</small>
                        @endif
                    </div>
                </div>                 

                <div class="form-group">
                    <div class="form-control-label">Status Aktif</div>
                    <label class="switch switch-text switch-success mt-3">
                        <input id="poststatus" type="checkbox" name="active" class="switch-input" checked>
                        <span data-on="On" data-off="Off" class="switch-label"></span>
                        <span class="switch-handle"></span>
                    </label>
                </div>                                                               


                <div class="form-group">
                    <label class="form-control-label">Pendidikan</label>
                    <div class="select">
                        <select name="education_id" class="form-control">
                            <option selected disabled value="">Pilih Pendidikan</option>
                            @foreach ($edu as $item)
                            <option {{ $data->education_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>                            
                            @endforeach
                        </select>
                        @if ($errors->has('education_id'))
                            <small class="form-text text-danger">{{ $errors->first('education_id') }}</small>
                        @endif
                    </div>
                </div>                

                <div class="form-group">
                    <label class="form-control-label">Pekerjaan</label>
                    <div class="select">
                        <select name="occupation_id" class="form-control">
                            <option selected disabled value="">Pilih Pekerjaan</option>
                            @foreach ($occu as $item)
                            <option {{ $data->occupation_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>                            
                            @endforeach
                        </select>
                        @if ($errors->has('occupation_id'))
                            <small class="form-text text-danger">{{ $errors->first('occupation_id') }}</small>
                        @endif
                    </div>
                </div>                
            </div>
            <button type="submit" class="btn btn-outline-primary">Simpan</button>
        </form>
    </div>
</section>  
@endsection

@push('scripts')
<script>
</script>
@endpush