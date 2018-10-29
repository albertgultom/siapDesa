@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5 text-uppercase">daftar produk hukum</h3>
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
              <a href="{{route('juristical.create')}}" class="btn btn-info mt-2 ml-5">Tambah Produk Hukum</a>
            </div>
          </div>
          <table id="posttable" class="table table-borderless table-data3">
            <thead>
              <tr>
                <th>ID</th>
                <th>tanggal</th>
                <th>judul</th>
                <th>Aktif</th>
                <th>Berkas</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
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
    // ordering: false,
    ajax: {
      url: '{{ route('juristicals') }}',
      dataSrc: '',
    },
    order: [[ 1, "desc" ]],
    columns: [
      {data: 'id'},
      {data: 'created'},
      {data: 'name'},
      {data: 'active'},
      {data: 'file'},
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
        targets: [5],
        data: 'id',
        render: function ( data, type, row, meta ) {
          return '<a href="/juristical/'+data+'/edit" class="btn">edit</a>';
        }
      }
    ]
  });
</script>
@endpush