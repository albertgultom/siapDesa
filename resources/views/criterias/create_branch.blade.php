@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($data != null)      
                <h3 class="title-5 text-uppercase">buat cabang</h3>
                @endif
                @if ($data == null)      
                <h3 class="title-5 text-uppercase">buat Kepala</h3>
                @endif                                
            </div>
        </div>
    </div>
</section>

<hr class="line-seprate">
<!-- SECTION BODY -->
<section class="statistic-chart">
    @if ($data != null)
    <div class="container">
        <div class="col-md-6">
            <div class="row">
                <div class="form-group{{ $errors->has('nik') ? ' has-danger' : '' }}">
                    <label class="form-control-label text-uppercase">Nama Induk</label>
                    <input type="text" name="nik" value="{{ $data != null ? $data->name : '' }}" class="form-control" disabled="disabled">
                </div>            
            </div>            
        </div>
    </div>  
    <hr class="line-seprate">
    @endif    
    <div class="container" style="padding-top: 10px;">
        <input type="hidden" id="oid_parent" value="{{ $id }}">
        <input type="hidden" id="tree_parent" value="{{ $data != null ? $data->tree : null }}">                
        <input type="hidden" id="comparative_parent" value="{{ $comparative }}">                
        <input type="hidden" id="flag_decimal_parent" value="{{ $data->flag_decimal }}">                

        @if ($comparative <= 1)                              
        <div class="row">

            <div class="col-md-6">
                {{-- NAME --}}
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label">Nama</label>
                    <input type="text" name="name" id="name" placeholder="Nama" value="{{ old('name') }}" class="form-control">
                    <small class="form-text text-danger" id="msg_name"></small>
                </div>                

                {{-- IDENTITY --}}
                @if ($data != null)                      
                    @if ($data->tree == 4 || $comparative == 1)
                    <div class="form-group{{ $errors->has('identity') ? ' has-danger' : '' }}">
                        <label class="form-control-label">Satuan</label>
                        <input type="text" name="identity" id="identity" placeholder="Satuan" value="{{ old('identity') }}" class="form-control">
                        <small class="form-text text-danger" id="msg_satuan"></small>
                    </div>    
                    @endif
                @endif                            

                @if ($data->tree != 4 && $comparative < 1)                
                <div class="form-group">
                    <div class="form-control-label">Desimal</div>
                    <label class="switch switch-text switch-success mt-3">
                        <input id="flag_decimal" type="checkbox" name="flag_decimal" class="switch-input" checked>
                        <span data-on="On" data-off="Off" class="switch-label"></span>
                        <span class="switch-handle"></span>
                    </label>
                </div>                
                @endif
            </div>
            <div class="col-md-6">
                {{-- comparative --}}
                @if ($data->tree != 4 && $comparative > 1)                
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label">Data Pembanding</label>
                    <input type="number" name="comparative" id="comparative" placeholder="Data Pembanding" value="{{ old('comparative') }}" class="form-control">
                    <small class="form-text text-danger" id="msg_comparative"></small>
                </div>                
                @endif

                {{-- NUMERAL --}}
                @if ($data != null)       
                    @if ($data->tree == 4 || $comparative == 1)                                               
                    <div class="form-group{{ $errors->has('numeral') ? ' has-danger' : '' }}">
                        <label class="form-control-label">Numerik</label>
                        <input type="number" name="numeral" id="numeral" placeholder="Numerik" value="{{ old('numeral') }}" class="form-control">
                        <small class="form-text text-danger"></small>
                    </div>
                    @endif
                @endif                                    
            </div>

            <button type="submit" class="btn btn-outline-primary" id="btn-submit-form">Simpan</button>        
        </div>
        @endif

        @if ($comparative > 1)                              
        <div class="row">

            <div class="col-md-12">
                {{-- comparative --}}
                @for($i=0;$i<=$comparative;$i++)
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    @php 
                    $label     = ($i == 0) ? ($detail_tabulations != null ? $detail_tabulations[$i]->name : 'Judul') : ($detail_tabulations != null ? $detail_tabulations[$i]->name : 'none');
                    $type_data = ($i == 0) ? 'text' : ($detail_tabulations != null ? 'number' : 'text');
                    @endphp
                    <label class="form-control-label">{{ $label }}</label>
                    <input type="{{$type_data}}" name="comparative" id="comparative_{{$i}}" placeholder="{{ $label }}" value="" class="form-control">
                    <small class="form-text text-danger msg_comparative_" id="msg_comparative_{{$i}}"></small>
                </div>                
                @endfor
            </div>
            <button type="submit" class="btn btn-outline-primary" id="btn-submit-form-comparative">Simpan</button>        
        </div>
        @endif        

    </div>


</section>  
@endsection

@push('scripts')
<script>
    $("#comparative").val(0);
    $('.datepicker').datepicker({
        maxDate: new Date,
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        daysOfWeekHighlighted: "0,6"        
    }); 

    $("#flag_decimal").click(function() {
        if (this.value == 'on')$(this).val('off');
        else if(this.value == 'off')$(this).val('on');
    })
    
    $("#btn-submit-form").click(function() {        
        var name                = $("#name").val();
        var numeral             = $("#numeral").val();
        var identity            = $("#identity").val();
        var comparative         = $("#comparative").val();
        var oid                 = $("#oid_parent").val();
        var tree                = $("#tree_parent").val();
        var comparative_parent  = $("#comparative_parent").val();
        var flag_decimal_parent = $("#flag_decimal_parent").val(); 
        var CSRF_TOKEN          = $('meta[name="csrf-token"]').attr('content');
        var valid               = 0;
        var flag_decimal        = $('#flag_decimal').val();

        $("#msg_name").html("");        
        if (tree == "" || tree != 4) {   
            if (name.length == 0) {
                $("#msg_name").html("wajib diisi.");
            }
            else
            {
                valid = 1;
            }
        } else if(tree == 4) {
            valid = 1;
        }

        if (valid == 1) {
            $.ajax({
                url :'{{route('criteria.store')}}',
                type:"post",
                data:{
                        _token             : CSRF_TOKEN,
                        name               : name,
                        numeral            : numeral,
                        identity           : identity,
                        comparative        : comparative,
                        comparative_parent : comparative_parent,
                        tree               : tree,
                        oid                : oid,
                        flag_decimal       : flag_decimal,
                        flag_decimal_parent: flag_decimal_parent
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
        }


    });    

    $("#btn-submit-form-comparative").click(function() {        
        
        var inputs             = document.getElementsByName("comparative").length;
        var data_detail        = [];
        var valid              = 0;
        var oid_parent         = $("#oid_parent").val();
        var tree_parent        = $("#tree_parent").val();
        var comparative_parent = $("#comparative_parent").val();
        var CSRF_TOKEN         = $('meta[name="csrf-token"]').attr('content');
        $(".msg_comparative_").html("");        
        for (let index = 0; index < inputs; index++) 
        {
            raise_data = $("#comparative_"+index).val();
            if(raise_data.length <= 0)
            {
                $("#msg_comparative_"+index).html("wajib diisi  ");
                valid = 0; 
            }
            else
            {
                data_detail[index] = {'data' : raise_data}
                valid = 1;
            }
        }

        if (valid == 1) {
            $.ajax({
                url :'{{route('criteria.store_new')}}',
                type:"post",
                data:{
                        _token            : CSRF_TOKEN,
                        comparative_parent: comparative_parent,
                        tree_parent       : tree_parent,
                        oid_parent        : oid_parent,
                        data_detail       : data_detail
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
        } else {
            alert('fail');
        }

    });
</script>
@endpush