@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5">DAFTAR APARATUR DESA</h3>
        <hr class="line-seprate">
      </div>
    </div>
  </div>
</section>
<!-- SECTION BODY -->
<section class="statistic-chart">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="d-flex flex-wrap mb-3">
          @foreach ($data as $item)
          <div class="aparatur p-1"  data-id="{!! $item->id !!}">
            <div class="media p-2 border rounded bg-white">
              <img src="{{asset('storage\apparatus\\'.$item->image)}}" class="img-apparatus rounded-circle" alt="">
              <div class="media-body pl-2">
                <small><i>Nama :</i></small>
                <p class="text-primary">{!!$item->name!!}</p>
                <small><i>Jabatan :</i></small>
                <p class="text-primary">{!!$item->position!!}</p>
                <p class="mb-0"><small><i>Nomor posisi :</i></small><span class="pl-2 text-primary">{!!$item->number!!}</span></p>
                <p>
                  <small><i>Status aktif :</i></small>
                  @if($item->active == 1)
                    <span class="pl-2 text-primary">YA</span>
                  @else
                    <span class="pl-2 text-danger">TIDAK</span>
                  @endif
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card border-secondary">
          <div class="card-header">
            <strong>Kategori</strong>
            <small> form</small>
          </div>
          <div class="card-body card-block">
            <form action="{{route('apparatus.store')}}" method="post" class="row" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="apparatusId" id="apparatusId">
              <div class="form-group col-12">
                <img 
                  id="InputFile01" 
                  src="{{asset('storage\apparatus\who.png' )}}" 
                  class="img-apparatus mx-auto d-block rounded-circle" 
                  alt="">
                <div class="">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="apImage" id="imageFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label text-truncate" id="ImageFile01" for="InputFile01" >Pilih foto...</label>
                  </div>
                </div>
                <small class="form-text text-success">ukuran file square / kotak</small>
              </div>
              <div class="form-group col-12">
                <label for="apName" class="form-control-label">Nama :</label>
                <input type="text" id="apName" name="name" placeholder="..." class="form-control">
                @if ($errors->has('name'))
                  <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                @endif
              </div>
              <div class="form-group col-12">
                <label for="apPosition" class="form-control-label">Jabatan :</label>
                <input type="text" id="apPosition" name="position" placeholder="..." class="form-control">
                @if ($errors->has('position'))
                  <small class="form-text text-danger">{{ $errors->first('position') }}</small>
                @endif
              </div>
              <div class="form-group col-6">
                <label for="apNumber" class="form-control-label">Nomor posisi :</label>
                <input type="text" id="apNumber" name="number" placeholder="..." class="form-control">
                @if ($errors->has('number'))
                  <small class="form-text text-danger">{{ $errors->first('number') }}</small>
                @endif
              </div>
              <div class="form-group col-6">
                <div class="form-control-label">Status Aktif :</div>
                <label class="switch switch-text switch-success mt-3">
                  <input type="checkbox" name="active" id="apStatus" class="switch-input" checked>
                  <span data-on="On" data-off="Off" class="switch-label"></span>
                  <span class="switch-handle"></span>
                </label>
              </div>
              <div class="col-12 mt-4">
                <button   type="submit" class="btn btn-outline-primary btn-sm">Simpan</button>
                <button type="reset" onclick="myFunction()" class="float-right btn btn-danger btn-sm">
                  <i class="fa fa-ban"></i> Reset
                </button>
              </div>
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
  $(document).ready(function(e){
    var toggle= '{{$item->active}}';
    // console.log(toggle);
  });
  $('.aparatur').click(function(e){
    e.preventDefault();
    read = $(this).data('id');
    
    $.ajax({
      method: "GET",
      url: "/apparatus/"+read,
      dataType: "json",
      cache: false
    }).done (function(res){
      // console.log(res.active); 
      
      $("#apName").val(res.name);
      $("#apPosition").val(res.position);
      $("#apNumber").val(res.number);
      $("#apImage").text(res.image);
      // $("#apStatus").val(res.active);
      if(res.active != 1){
        $('#apStatus').removeAttr('checked');
      }else{
        $('#apStatus').attr('checked','checked');
      }
      $('#InputFile01').attr('src','storage/apparatus/'+res.image);
      $('#apparatusId').val(res.id);
    }).fail(function(err){
      alert("Mohon maaf, terjadi kesalahan sistem.");
      console.log(err);
    });
  });
  $(document).ready(function(){
    $('input[type="file"]').change(function(e) {
      var filename = e.target.files[0].name;
       // console.log('#bla');
       $('.custom-file-label').text(filename);
 
       var reader = new FileReader();
       reader.onload = function (e) {
         $('#InputFile01').attr('src', e.target.result);
         // console.log(e.target.result);
       }
       reader.readAsDataURL(this.files[0]);
     });
     
  });
  function myFunction() {
    $('#InputFile01').attr('src', "storage/apparatus/who.png");
    $('#apStatus').removeAttr('checked');
  }
  
</script>
@endpush

@push('styles')
<style>
  .aparatur{
    width: 50%;
  }
  .img-apparatus{
    width: 150px;
    height: auto;
  }
  @media (max-width:732px) {
    .aparatur{
      width: 100%;
    }
  }
</style>
@endpush