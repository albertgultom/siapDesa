@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5">DAFTAR BERITA</h3>
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
              <button class="btn btn-info mt-2 ml-5">Tambah Berita</button>
              {{-- <div class="rs-select2--light rs-select2--md">
                <select class="js-select2" name="time">
                  <option selected="selected">Tipe</option>
                  @foreach($data['types'] as $type)
                    <option value="{!!$type->id!!}">{!!$type->name!!}</option>
                  @endforeach
                </select>
                <div class="dropDownSelect2"></div>
              </div>
              <div class="rs-select2--light rs-select2--lg">
                <select class="js-select2" name="property">
                  <option selected="selected">Kategori</option>
                  @foreach($data['tags'] as $tag)
                    <option value="{!!$tag->id!!}">{!!$tag->name!!}</option>
                  @endforeach
                </select>
                <div class="dropDownSelect2"></div>
              </div> --}}
            </div>
          </div>
          {{-- <table id="posttable"> --}}
          <table id="posttable" class="table table-borderless table-data3">
            <thead>
              <tr>
                <th>ID</th>
                <th>tanggal</th>
                <th>tipe</th>
                <th>judul</th>
                <th>Aktif</th>
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
    ajax: {
      url: '{{ route('posts') }}',
      dataSrc: '',
    },
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
      }
    ]
  });
</script>
@endpush