@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5">Daftar Pelayanan</h3>
        <hr class="line-seprate">
      </div>
    </div>
  </div>
</section>
<!-- SECTION BODY -->
<section class="statistic-chart">
    <div class="container">
        <form action="{{route('new.store')}}" method="post" class="row" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-md-8">

                <div class="form-group">
                    <label class="form-control-label">NIK</label>
                    <div class="select">
                        <select name="population_id" class="form-control">
                            <option selected disabled value="">Pilih NIK</option>
                            @foreach ($populations as $item)
                            <option value="{{ $item->id }}">{{ $item->nik }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('population_id'))
                            <small class="form-text text-danger">{{ $errors->first('population_id') }}</small>
                        @endif
                    </div>
                </div>                

                <div class="form-group">
                    <label class="form-control-label">Layanan</label>
                    <div class="select">
                        <select name="facility_id" class="form-control">
                            <option selected disabled value="">Pilih Pekerjaan</option>
                            @foreach ($facilities as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('facility_id'))
                            <small class="form-text text-danger">{{ $errors->first('facility_id') }}</small>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </div>
        </form>
    </div>
</section>  
@endsection

@push('scripts')
<script>
    $('.datepicker').datepicker({
        maxDate: new Date,
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        daysOfWeekHighlighted: "0,6"        
    });     
</script>
@endpush