@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5">Layanan Yang diproses</h3>
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
            </div>
          </div>
          {{-- <table id="servicingtable"> --}}
          <table id="servicingtable" class="table table-borderless table-data3">
            <thead>
              <tr>
                <th>ID</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Layanan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
      <!-- Button trigger modal -->
      {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
      </button> --}}
      {{-- <canvas id="tesChart"></canvas> --}}
    </div>
  </div>
</section>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam laborum quas laudantium repellat? Veniam, porro voluptates accusamus aut exercitationem rem facere, tempora molestias odio quam obcaecati et, eos recusandae beatae!</p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consectetur, voluptate similique? Nemo delectus, quae magnam odio culpa nesciunt! Nam necessitatibus molestiae assumenda maxime odit explicabo atque ducimus placeat, repellat voluptatem?</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur consectetur voluptatum alias aperiam nam impedit ea quasi optio eius, odit quisquam eveniet sunt incidunt perspiciatis sed corporis. Ducimus, quod cum.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $("#servicingtable").DataTable({
    scrollY: "320px",
    scrollCollapse: true,
    paging: false,
    ajax: {
      url: '{{ route('process_services') }}',
      dataSrc: '',
    },
    order: [[ 0, "desc" ]],
    columns: [
      {data: 'updated_at'},
      {data: 'nik'},
      {data: 'name'},
      {data: 'facilty'},
    ],
    columnDefs: [
      {
        targets: [ 0 ],
        visible: false,
        searchable: false
      },
      {
        targets: [4],
        data: 'id',
        render: function ( data, type, row, meta ) {
          return '<a href="/servicing/process_verify/'+data+'" class="btn">Status Selesai</a>';
        }
      }
    ]
  });

  // $('#myModal').on('shown.bs.modal', function () {
  //   $('#myInput').trigger('focus')
  // });

  // var ctx = document.getElementById("tesChart");
  // var myChart = new Chart(ctx, {});
</script>
@endpush