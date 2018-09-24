@extends('layouts.dashboard')
@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5">DAFTAR TIPE</h3>
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
            <a href="/type/create" button class="btn btn-info mt-2 ml-5" >Tambah Tipe</button></a>
            {{-- <a href="/type/create"></a> --}}
            </div>
          </div>
          {{-- <table id="posttable"> --}}
          <table id="posttable" class="table table-borderless table-data3">
            <thead>
              <tr>
                <th>ID</th>
                <th>nama</th>
                <th>level</th>
                <th>tanggal</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
      <canvas id="tesChart"></canvas>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  $("#posttable").DataTable({
    scrollY: "320px",
    scrollCollapse: true,
    paging: false,
    ajax: {
      url: '{{ route('types') }}',
      dataSrc: '',
    },
    columns: [
      {data: 'id'},
      {data: 'name'},
      {data: 'level'},
      {data: 'created'},
    ],
    columnDefs: [
      {
        targets: [ 0 ],
        visible: false,
        searchable: false
      },
      {
        targets: [ 4 ],
        data: 'id',
        render: function ( data, type, row, meta ) {
          return `
            <a href="/type/`+data+`/edit"> Edit </a>
              `;
      }
      }
    ]
  });
  var ctx = document.getElementById("tesChart");
  var myChart = new Chart(ctx, {});
</script>
@endpush