@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5 text-uppercase">buat cabang</h3>
      </div>
    </div>
  </div>
</section>

<hr class="line-seprate">
<!-- SECTION BODY -->
<section class="statistic-chart">
    <div class="container">
        <div class="col-md-6">

            <div class="row">
                <div class="form-group{{ $errors->has('nik') ? ' has-danger' : '' }}">
                    <label class="form-control-label text-uppercase">Nama Induk</label>
                    <input type="text" name="nik" value="{{ $data != null ? $data->name : '' }}" class="form-control" disabled="disabled">
                    <input type="hidden" id="oid_parent" value="{{ $id }}">
                    <input type="hidden" id="tree_parent" value="{{ $data != null ? $data->name : null }}"
                </div>            
            </div>
            
        </div>

    </div>
    <hr class="line-seprate">
    <div class="container" style="padding-top: 10px;">
        <div class="row">
        <div class="col-md-6">
                {{-- NAME --}}
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label">Nama</label>
                    <input type="text" name="name" id="name" placeholder="Nama" value="{{ old('name') }}" class="form-control">
                    @if ($errors->has('name'))
                        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>                

                {{-- IDENTITY --}}
                <div class="form-group{{ $errors->has('identity') ? ' has-danger' : '' }}">
                    <label class="form-control-label">Satuan</label>
                    <input type="text" name="identity" id="identity" placeholder="Satuan" value="{{ old('identity') }}" class="form-control">
                    @if ($errors->has('identity'))
                        <small class="form-text text-danger">{{ $errors->first('identity') }}</small>
                    @endif
                </div>                

            </div>
            <div class="col-md-6">
                {{-- NUMERAL --}}
                <div class="form-group{{ $errors->has('numeral') ? ' has-danger' : '' }}">
                    <label class="form-control-label">Numerik</label>
                    <input type="text" name="numeral" id="numeral" placeholder="Numerik" value="{{ old('numeral') }}" class="form-control">
                    @if ($errors->has('numeral'))
                        <small class="form-text text-danger">{{ $errors->first('numeral') }}</small>
                    @endif
                </div>                

            </div>
            <button type="submit" class="btn btn-outline-primary" id="btn-submit-form">Simpan</button>        
        </div>
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
    
    $("#btn-submit-form").click(function() {
        var name       = $("#name").val();
        var numeral    = $("#numeral").val();
        var identity   = $("#identity").val();
        var oid        = $("#oid_parent").val();
        var tree       = $("#tree_parent").val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url :'{{route('criteria.store')}}',
            type:"post",
            data:{
                    _token  : CSRF_TOKEN,
                    name    : name,
                    numeral : numeral,
                    identity: identity,
                    tree    : tree, 
                    oid     : oid
                },
            beforeSend:function(){
                $("#loadprosess").modal('hide');                
                $("#loadprosess").modal('show');                        
                // $('#success-block').html('');                    
                // $('#error-block').html('');
            },
            success:function(msg)
            {
                console.log(msg.text);
                $("#loadprosess").modal('hide');                                        
                if (msg.status == 1)
                {
                    $('#success-block').html(msg.text);
                    window.location.href = msg.url;                    
                }
                else
                {
                    $('#error-block').html(msg.text);
                }
            },
            error:function(){
                $('#error-block').html('Error system');
            }
        })

    });    
</script>
@endpush