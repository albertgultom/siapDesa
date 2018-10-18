@extends('layouts.pelayanan')

@section('layanan')
<div class="row">
  <div class="col-lg-3">
    <ul class="list-group list-group-flush">
      @foreach ($tags as $item)
      <a href="{{route('pelayanan.index',['oid' => $item->id,'tag' => $item->name])}}">
    <li class="list-group-item" >{!!$item->name!!}</li>
      </a>
      @endforeach
    </ul>
      </a>
  </div>
  <div class="col-lg-9">
    <div class="card features">
        <div class="card-body">
            <div class="media">
                <div class="media-body">
                    <p>Silahkan mengisi NIK dibawah ini untuk mencari Status Pelayanan</p>
                    <div class="container">
                        <h4 class="card-title">NIK</h4>                        
                        <div class="form-group{{ $errors->has('nik') ? ' has-danger' : '' }}">
                            <input type="text" name="nik" id="nik" placeholder="NIK" value="{{ old('nik') }}" class="form-control">
                            @if ($errors->has('nik'))
                                <small class="form-text text-danger">{{ $errors->first('nik') }}</small>
                            @endif
                            <small class="form-text text-danger" id="error-block"></small>
                            <small class="form-text text-success" id="success-block"></small>                                    
                        </div>                            

                        <button type="submit" id="btn-submit-form" class="btn btn-outline-primary">Cari</button>                                                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="layout-container" class="container"></div>
  </div>
</div>
@endsection
@push('scripts')
<script>

    $("#btn-submit-form").click(function() {
        var nik         = $("#nik").val();
        var CSRF_TOKEN  = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url :'{{route('trace_services')}}',
            type:"post",
            data:{_token: CSRF_TOKEN, nik : nik},
            beforeSend:function(){
                $("#loadprosess").modal('hide');                
                $("#loadprosess").modal('show');                        
                $('#success-block').html('');                    
                $('#error-block').html('');
            },
            success:function(msg)
            {
                console.log(msg.data);
                console.log(msg.data[0]);                
                console.log(msg.data[0].facilty);
                console.log(msg.data.length);                    
                $("#loadprosess").modal('hide');                                        
                if (msg.status == 1)
                {
                    $('#success-block').html(msg.text);
                    for (index = 0; index < msg.data.length; index++) {
                        $('#layout-container').html('<div class="card features">'+
                                                    '<div class="card-body">'+
                                                        '<div class="media">'+
                                                            '<div class="media-body">'+
                                                                '<p>Silahkan mengisi NIK dibawah ini untuk mencari Status Pelayanan</p>'+
                                                                '<div class="container">'+
                                                                    '<h4 class="card-title">NIK</h4>'+                        
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>');
                    }
                    
                }
                else
                {
                    $('#error-block').html(msg.text);
                }
                $("#loadprosess").modal('hide');                                                        
            },
            error:function(){
                Lobibox.notify('error', {
                    msg: 'Gagal melakukan transaksi'
                });
            }
        })

    });

</script>
@endpush