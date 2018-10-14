@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5">{{$data->title}}</h3>
        <hr class="line-seprate">
      </div>
    </div>
  </div>
</section>
<!-- SECTION BODY -->
<section class="statistic-chart">
    <div class="container">
    <input type="hidden" id="oid" value="{{$data->id}}">
    <form action="{{route('new.update', $data->id)}}" method="post" class="row" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">            
            <div class="col-md-6">

                <div class="form-group">
                    <input type="hidden" name="status" value="{{ old('name', $data->status) }}">
                    <label class="form-control-label">NIK</label>
                    <div class="select">
                        <select name="population_id" class="form-control" {{ $data->flag == 1 ? 'disabled="disabled"' : '' }}>
                            <option selected disabled value="">Pilih NIK</option>
                            @foreach ($populations as $item)
                            <option {{ $data->population_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nik }}</option>                                                        
                            @endforeach
                        </select>
                        @if ($errors->has('population_id'))
                            <small class="form-text text-danger">{{ $errors->first('population_id') }}</small>
                        @endif
                    </div>
                </div>                

                <div class="form-group">
                    <label class="form-control-label">Nama</label>
                    <input type="text" id="res_name" class="form-control" disabled="disabled">
                </div>   
                <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </div>
            <div class="col-md-6">            
                <div class="form-group">
                    <label class="form-control-label">Layanan</label>
                    <div class="select">
                            <select name="facility_id" class="form-control" {{ $data->flag == 1 ? 'disabled="disabled"' : '' }}>
                            <option selected disabled value="">Pilih Pekerjaan</option>
                            @foreach ($facilities as $item)
                            <option {{ $data->facility_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>                            
                            @endforeach
                        </select>
                        @if ($errors->has('facility_id'))
                            <small class="form-text text-danger">{{ $errors->first('facility_id') }}</small>
                        @endif
                    </div>
                </div>
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
    
    $(document).ready(function(){
        oid = $("#oid").val();
        $.ajax({
            url: "/servicing/servicings/"+oid+"/id",
            method: "get",
            dataType: "json"
        }).done(function(res) {
            // console.log(res[0].id)
            $("#res_name").val(res[0].name);
        }).fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    });        
</script>
@endpush