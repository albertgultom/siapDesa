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
        @if ($tag)
        <h3>{{ $tag }}</h3>
        <p>{!! $facility->detail !!}</p>        
        <div class="card features">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <p>Silahkan mengisi NIK dibawah ini untuk melakukan pengajuan {{ $tag }}</p>
                        <div class="container">
                            <!-- <form action="{{route('propose_service.store')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}} -->
                                <input type="hidden" name="tag" id="tag" value="{{ $tag }}">
                                <input type="hidden" name="facility_id" id="facility_id" value="{{ $oid }}">                                
                                <h4 class="card-title">NIK</h4>                        
                                <div class="form-group{{ $errors->has('nik') ? ' has-danger' : '' }}">
                                    <input type="text" name="nik" id="nik" placeholder="NIK" value="{{ old('nik') }}" class="form-control">
                                    @if ($errors->has('nik'))
                                        <small class="form-text text-danger">{{ $errors->first('nik') }}</small>
                                    @endif
                                </div>         

                                <h4 class="card-title">Catatan</h4>                        
                                <div class="form-group{{ $errors->has('nik') ? ' has-danger' : '' }}">
                                    <textarea name="note" id="note" class="form-control">{{ old('note') }}</textarea>
                                    @if ($errors->has('note'))
                                        <small class="form-text text-danger">{{ $errors->first('nik') }}</small>
                                    @endif
                                    <small class="form-text text-danger" id="error-block"></small>
                                    <small class="form-text text-success" id="success-block"></small>                                    
                                </div>                                                            

                                <button type="submit" id="btn-submit-form" class="btn btn-outline-primary">Ajukan Pelayanan</button>                                                            
                            <!-- </form>                         -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
  </div>
</div>
@endsection
@push('scripts')
<script>

    $("#btn-submit-form").click(function() {
        var nik         = $("#nik").val();
        var note         = $("#note").val();        
        var facility_id = $("#facility_id").val();
        var CSRF_TOKEN  = $('meta[name="csrf-token"]').attr('content');

        if (nik.length <= 0) {
            Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
            {
                title: 'Peringatan',
                msg  : "NIK Wajib Diisi."
            });
        }
        else
        {

        $.ajax({
            url :'{{route('propose_service.store')}}',
            type:"post",
            data:{_token: CSRF_TOKEN, nik : nik, facility_id : facility_id, note : note},
            beforeSend:function(){
                Lobibox.progress({
                    title: 'Memproses Data',
                    label: '',          
                    onShow: function ($this) {
                        var i = 0;
                        var inter = setInterval(function () {
                            if (i > 100) {
                                inter = clearInterval(inter);
                            }
                            i = i + 1;
                            $this.setProgress(i);
                        }, 10);
                    }
                });            
                $('#success-block').html('');                    
                $('#error-block').html('');
            },
            success:function(msg)
            {
                if (msg.status == 1)
                {
                    Lobibox.notify('success', {
                        msg: msg.text
                    });                    
                    setTimeout(function(){
                        setTimeout(function(){
                            location.reload();
                        }, 500);
                    }, 500);                    
                }
                else
                {
                    Lobibox.notify('warning', {
                        msg: msg.text
                    });                    
                    $('#error-block').html(msg.text);                    
                }
            },
            error:function(){
                $('#error-block').html('Error system');
            }
        })            
        }
    });

</script>
@endpush