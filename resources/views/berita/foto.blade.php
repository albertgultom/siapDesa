@extends('layouts.pustaka')

@section('pustaka')
<div class="row mt-3">
  <div class="col-md-9" style="border-right:solid 1px #eee;">
    <h4 class="mb-3">List Galeri Foto</h4>
    <div class="row">
        @foreach ($foto as $item)            
      <a href="{{route('foto.lihat',$item->id)}}" class="col-12 col-lg-4 mb-2 berita">
            <div class="card features">
                
              <img class="card-img-top" src="{{asset('storage/photos/'.$item['contents '])}}" alt="Card image cap">
              {{-- {{$item['contents ']}} --}}
              <div class="card-body">
                <div class="media">
                  <div class="media-body">
                      <h4 class="card-title">{!! $item->name !!}</h4>
                      <small class="text-right">{!! $item->updated_at !!}</small>
                      <div>
                        @foreach ($item->tags as $tag)
                          <small class="badge badge-pill badge-secondary">{!! $tag->name !!}</small> 
                        @endforeach
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        @endforeach
      </div>
  </div>
  {{-- <div class="col-md-3">
    <h4>Daftar</h4>
    <ul>
      <li>Kegiatan Kepala Desa - Aktifitas 1</li>
      <li>Kegiatan Kepala Desa - Aktifitas 2</li>
    </ul>
  </div> --}}
</div>
@endsection

@push('scripts')
<script>
  // $('[data-fancybox="gallery"]').fancybox({
    // Options will go here
  // });
  $(document).on('click', '.view-detail', function(e){
    e.preventDefault();
    id = $(this).data('view');
    $.ajax({
      url: "/gallery/"+id,
      method: "GET",
      dataType: "json"
    }).done(function(res) {
      $('#viewModalLabel').text(res.name);
      $('#viewModalType').text(res.type);
      $('#viewModalDate').text(res.date);
      $('#viewModalTags').empty();
      $('#viewModalContents').empty();

      $.each(res.tags, function(i, v){
        $('#viewModalTags').append('<span class="ml-2 badge badge-info">'+v+'</span>');
      });
      
      $.each(res.contents, function(i, v){
        if(res.content == 'photo'){
          media = `
            <img 
              src="{{asset('storage/photos/`+v.image+`')}}" 
              class="card-img-top img-fluid" 
              alt="Card image cap">
          `;
        }else{
          media = `
          <div class="embed-responsive embed-responsive-16by9">
            <iframe 
              class="embed-responsive-item" 
              src="`+v.video+`" 
              allowfullscreen></iframe>
          </div>
          `;
        }
        $('#viewModalContents').append(`
          <div class="card mb-2 bg-light viewModal`+res.content+`">
            `+media+`
            <div class="card-body">
              <p class="card-text">`+v.name+`</p>
            </div>
          </div>
        `);
      });
      
      $("#viewModal").modal('show');
    }).fail(function( jqXHR, textStatus ) {
      alert( "Request failed: " + textStatus );
    });
  });
</script>
@endpush