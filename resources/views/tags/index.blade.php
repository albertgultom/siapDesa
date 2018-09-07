@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5">DATA KATEGORI</h3>
        <hr class="line-seprate">
      </div>
    </div>
  </div>
</section>
<!-- SECTION BODY -->
<section class="statistic-chart">
  <div class="container">
    <div class="row">
      <div class="col-md-6 p-3">
        <div class="list-group">
          <button 
            type="button" 
            class="list-group-item list-group-item-action active">
            <strong>List Data Kategori</strong>
          </button>
          @foreach($data as $item)
            <button 
              type="button"
              data-id="{!! $item->id !!}"
              class="list-group-item list-group-item-action catlist">
              {!! $item->name !!}
            </button>
          @endforeach
        </div>
      </div>
      <div class="col-md-6 p-3">
        <div class="card border-secondary">
          <div class="card-header">
            <strong>Kategori</strong>
            <small> form</small>
          </div>
          <div class="card-body card-block">
            <form id="formCat" action="{{route('tag.store')}}" method="post" class="">
              {{csrf_field()}}
              <input type="hidden" name="tagid" id="tagid">
              <div class="form-group">
                <label for="tagname" class="form-control-label">Judul</label>
                <input type="text" id="tagname" name="tagname" placeholder="..." class="form-control">
                <small class="help-block">Silahkan isi nama judul</small>
              </div>
              <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
              </button>
              <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  $('.catlist').click(function(e){
    e.preventDefault();
    read = $(this).data('id');
    // console.log(read);
    $.ajax({
      method: "GET",
      url: "/tag/"+read,
      dataType: "json",
      cache: false
    }).done(function(res){
      $("#tagname").val("");
      $("#tagname").val(res.name);
      $('#tagid').val(res.id);
    }).fail(function(err){
      alert("Mohon maaf, terjadi kesalahan sistem.");
      console.log(err);
    });
  });
  $("#formCat").submit(function(e){
    console.log('return ' + e)
  });
</script>
@endpush