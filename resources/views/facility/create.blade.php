@extends('layouts.dashboard')

@section('content')

<div class="row">
    <div class="col-md-12">
        
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($error->all as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(\Session::has('success'))
        <div class="alert alert-success">
        <p>{{\Session::get('success')}}</p>
        </div>
        @endif

        <div class="container">
        <form method="post" action="{{url('facility')}}" >
            {{csrf_field()}}    
            <div class="form-group col-md-12" >
                <br/>
                <h3 align="left">Tambah Pelayanan</h3>
                <br/>
                <label>Nama Pelayanan</label>                
                <input type="text" name="name" class="form-control" placeholder="Pelayanan"/>    
            </div>

            <div class="col-md-12">
                <div class="form-group">
                <label class="form-control-label">Detail</label>
                <div id="detail" style="background-color: #fff; height: 400px;"></div>
                <input type="hidden" name="detail">
                </div>
            </div>

            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-outline-primary"> Save </button>
            </div>

            
        </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var quill = new Quill('#detail',{
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