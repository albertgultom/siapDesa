@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5 text-uppercase">DAFTAR GALERI {!!$content!!}</h3>
        <hr class="line-seprate">
      </div>
    </div>
  </div>
</section>
<!-- SECTION BODY -->
<section class="statistic-chart">
  <div class="container">
    <div class="table-responsive m-b-40">
        <div class="table-data__tool">
          <div class="table-data__tool-left">
          <a href="{{route('gallery.create', ['content' => $content])}}" class="btn btn-info mt-2 ml-5 text-capitalize">Tambah Galeri {!!$content!!}</a>
          </div>
        </div>
        {{-- <table id="posttable"> --}}
        <table id="gallerytable" class="table table-borderless table-data3">
          <thead>
            <tr>
              <th>ID</th>
              <th>tanggal</th>
              <th>tipe</th>
              <th>judul</th>
              <th>Aktif</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!-- MODAL VIEW -->
<div 
  class="modal fade bd-example-modal-lg" 
  id="viewModal" 
  tabindex="-1" 
  role="dialog" 
  aria-labelledby="viewModalLabel" 
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel">Modal title</h5>
        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-white">
        <div>
          <span>Tanggal: </span>
          <span id="viewModalDate"></span>
        </div>
        <div>
          <span>Tipe: </span>
          <span id="viewModalType"></span>
        </div>
        <div class="mb-3">
          <span>Kategory: </span>
          <span id="viewModalTags"></span>
        </div>
        <hr>
        <div id="viewModalContents" class="d-flex flex-row flex-wrap"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $("#gallerytable").DataTable({
    scrollY: "320px",
    scrollCollapse: true,
    paging: false,
    ajax: {
      url: '{{ route('galleries', $content) }}',
      dataSrc: '',
    },
    order: [[ 1, "desc" ]],
    columns: [
      {data: 'id'},
      {data: 'created'},
      {data: 'type'},
      {data: 'name'},
    ],
    columnDefs: [
      {
        targets: [ 0 ],
        visible: false,
        searchable: false
      },
      {
        targets: [ 4 ],
        data: 'active',
        render: function ( data, type, row, meta ) {
          return `
            <label class="au-checkbox">
              <input type="checkbox" `+data+`>
              <span class="au-checkmark"></span>
            </label>`;
        }
      },
      {
        targets: [5],
        data: 'id',
        render: function ( data, type, row, meta ) {
          return `
            <a 
              href="#!" 
              class="btn view-detail" 
              data-view="`+data+`" 
              data-toggle="modal">detail</a> | 
            <a href="/gallery/`+data+`/edit" class="btn">edit</a>
          `;
        }
      }
    ]
  });
  
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

@push('styles')
<style>
  .modal-content {
    background: #ffc107 !important;
  }
  .viewModalphoto {
    width: 11rem;
    margin: .07rem;
  }
  .viewModalvideo {
    width: 22rem;
    margin: .07rem;
  }
</style>
@endpush