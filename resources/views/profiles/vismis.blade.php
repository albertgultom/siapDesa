@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title-5">Edit Visi dan Misi</h3>
              <hr class="line-seprate">
            </div>
          </div>
        </div>
        </section>
      <br>
<!-- SECTION BODY -->
<div class="container">
    <form action="{{route('profile.update',$edit->id)}}" method="post">
        <input type="hidden" name="_method" value="PATCH"/>
        {{csrf_field()}}  
        <div class="row">
            <div class="col-md-6 p-3" >
                <h3 class="title-5"> Visi</h3>
                <div id="body" style="background-color: #fff; height: 400px;">
                    {!! $edit->vision !!}
                </div>
              <input type="hidden" name="vision" >
            </div>
            <div class="col-md-6 p-3" >
                <h3 class="title-5"> Misi</h3>
                <div id="body2" style="background-color: #fff; height: 400px;">
                {!! $edit->mission !!}
                </div>
              <input type="hidden" name="mission"> 
            </div>
            <input type="submit" class="btn btn-primary" value="Save"/>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
var quill = new Quill('#body',{
  modules: {
    toolbar: QuilljsToolbarOptions
  },
  theme: 'snow',
  placeholder: '...'
});
var quill2 = new Quill('#body2',{
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
content2 = $("#body2").find(".ql-editor p").html();
if(isJson(content2) == true){
  quill2.setContents(JSON.parse(quill2.getContents().ops[0].insert))
}

$('form').submit(function(e){
  cfg = {};

  cek = quill.getContents().ops;
  convert = new QuillDeltaToHtmlConverter(cek, cfg).convert();
  $('input[name="vision"]').val(convert);

  cek1 = quill2.getContents().ops;
  convert1 = new QuillDeltaToHtmlConverter(cek1, cfg).convert();
  $('input[name="mission"]').val(convert1);
});
</script>
@endpush