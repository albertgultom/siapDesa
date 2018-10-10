@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-5">EDIT PEKERJAAN</h3>
                <hr class="line-seprate">
            </div>
        </div>
    </div>
</section>
<!-- SECTION BODY -->
<section class="statistic-chart">
    <div class="container">
        <form action="{{route('occupation.update', $data->id)}}" method="post" class="row" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            <div class="col-md-12">
                {{-- NAME --}}
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <label class="form-control-label">Nama</label>
                <input type="text" name="name" placeholder="Pendidikan" value="{{ old('name', $data->name) }}" class="form-control">
                @if ($errors->has('name'))
                    <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                @endif
                </div>
                <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </div>
        </form>
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
        toolbar: QuilljsToolbarOptions
        },
        theme: 'snow',
        placeholder: '...'
    });

    content = $("#body").find(".ql-editor p").html();
    if(isJson(content) == true){
        quill.setContents(JSON.parse(quill.getContents().ops[0].insert))
    }

    $('form').submit(function(e){
        cfg = {};
        cek = quill.getContents().ops;
        convert = new QuillDeltaToHtmlConverter(cek, cfg).convert();
        $('input[name="body"]').val(convert);
    });
</script>
@endpush