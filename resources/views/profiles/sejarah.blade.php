@extends('layouts.dashboard')
@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title-5">Sejarah</h3>
              <hr class="line-seprate">
            </div>
          </div>
        </div>
        </section>
      <br>
<!-- SECTION BODY -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{route('profile.update',$edit->id)}}" method="post">
      <input type="hidden" name="_method" value="PATCH"/>
      {{csrf_field()}}
      <div id="history" style="background-color: #fff; height: 400px;">
       {!! $edit->history !!}
      </div>  
      <input type="hidden" name="history" >
    </BR>
      <input type="submit" class="btn btn-primary" value="Save"/>
      </form>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
var quill = new Quill('#history',{
  modules: {
    toolbar: QuilljsToolbarOptions
  },
  theme: 'snow',
  placeholder: '...'
});

content = $("#history").find(".ql-editor p").html();
if(isJson(content) == true){
  quill.setContents(JSON.parse(quill.getContents().ops[0].insert))
}

$('form').submit(function(e){
  cfg = {};
  cek = quill.getContents().ops;
  convert = new QuillDeltaToHtmlConverter(cek, cfg).convert();
  $('input[name="history"]').val(convert);
});
</script>
@endpush