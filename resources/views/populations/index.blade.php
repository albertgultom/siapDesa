@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5">Penduduk</h3>
        <hr class="line-seprate">
      </div>
    </div>
  </div>
</section>
<!-- SECTION BODY -->
<section class="statistic-chart">
  <div class="container">
    <div class="row">
      <!-- DATA TABLE-->  
      <div class="col-md-12">
        <div class="table-responsive m-b-40">
          <div class="table-data__tool">
            <div class="table-data__tool-left">
              <a href="{{route('population.create')}}" class="btn btn-info mt-2 ml-5">Tambah Penduduk</a>
            </div>
          </div>
          {{-- <table id="populationtable"> --}}
          <table id="populationtable" class="table table-borderless table-data3">
            <thead>
              <tr>
                <th>ID</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Status Aktif</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          <div class="table-data__load"></div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Modal -->
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
        <div class="row">
          <div class="col-lg-6">

            <div class="form-group">
                <label class="form-control-label">NIK</label>
                <input type="text" id="viewModalnik" class="form-control" disabled="disabled">
            </div>                            

            <div class="form-group">
                <label class="form-control-label">Nama</label>
                <input type="text" id="viewModalname" class="form-control" disabled="disabled">
            </div>                            

            <div class="form-group">
                <label class="form-control-label">Jenis Kelamin</label>
                <input type="text" id="viewModalgender" class="form-control" disabled="disabled">
            </div>                            

            <div class="form-group">
                <label class="form-control-label">Tempat, tanggal lahir</label>
                <input type="text" id="viewModalbirthdate_and_place" class="form-control" disabled="disabled">
            </div>                                        

            <div class="form-group">
                <label class="form-control-label">Golongan Darah</label>
                <input type="text" id="viewModalbloodtype" class="form-control" disabled="disabled">
            </div>                                       

          </div>

          <div class="col-lg-6">

            <div class="form-group">
                <label class="form-control-label">Agama</label>
                <input type="text" id="viewModalreligion" class="form-control" disabled="disabled">
            </div>                                      

            <div class="form-group">
                <label class="form-control-label">Status</label>
                <input type="text" id="viewModalstatus" class="form-control" disabled="disabled">
            </div>                                      

            <div class="form-group">
                <label class="form-control-label">Pekerjaan</label>
                <input type="text" id="viewModaloccupy" class="form-control" disabled="disabled">
            </div>                                           

            <div class="form-group">
                <label class="form-control-label">Pendidikan</label>
                <input type="text" id="viewModaleducation" class="form-control" disabled="disabled">
            </div>                                                                                                      
          </div>
        </div>

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
  $('<div class="loading">Loading, please wait...!</div>').appendTo('div.table-data__load');
  $(document).ready(function(){
    $("#populationtable").DataTable({
      "bProcessing": true,
      "bServerSide": true,
      deferRender: true,
      scrollY: "320px",
      scrollCollapse: true,
      paging: false,
      ajax: {
        url: '{{ route('populations') }}',
        dataSrc: '',
      },
      order: [[ 0, "asc" ]],
      columns: [
        {data: 'id'},
        {data: 'nik'},
        {data: 'name'},
      ],
      columnDefs: [
        {
          targets: [ 0 ],
          visible: false,
          searchable: false
        },
        {
          targets: [ 3 ],
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
          targets: [4],
          data: 'id',
          render: function ( data, type, row, meta ) {
            return '<a href="#!" class="btn view-detail" data-view="'+data+'" data-toggle="modal">detail</a>'+
                    '| <a href="population/'+data+'/edit" class="btn">edit</a>';
          }
        }
      ],
      "initComplete": function( settings, json ) {
        $('div.loading').remove();
      }
    });
  });
  $(document).on('click', '.view-detail', function(e){
    e.preventDefault();
    id = $(this).data('view');
    $.ajax({
      url: "population/list/"+id,
      method: "get",
      dataType: "json"
    }).done(function(res) {
      // console.log(res[0].id)
      $('#viewModalnik').val(res[0].nik);
      $('#viewModalname').val(res[0].name);      
      $('#viewModalgender').val(res[0].gender);
      $('#viewModalbirthdate_and_place').val(res[0].birthplace_and_birthdate);
      $('#viewModalbloodtype').val(res[0].bloodtype);
      $('#viewModalreligion').val(res[0].religion);
      $('#viewModalstatus').val(res[0].status);
      $('#viewModaloccupy').val(res[0].occupation);      
      $('#viewModaleducation').val(res[0].education);

      $('#viewModalLabel').text('Data Penduduk '+res[0].nik+' ('+res[0].name+') ');
      // $('#viewModalTags').empty();
      // $('#viewModalContents').empty();

      // $.each(res.tags, function(i, v){
      //   $('#viewModalTags').append('<span class="ml-2 badge badge-info">'+v+'</span>');
      // });
      
      $("#viewModal").modal('show');
    }).fail(function( jqXHR, textStatus ) {
      alert( "Request failed: " + textStatus );
    });
  });

  // $('#myModal').on('shown.bs.modal', function () {
  //   $('#myInput').trigger('focus')
  // });

  // var ctx = document.getElementById("tesChart");
  // var myChart = new Chart(ctx, {});
</script>
@endpush