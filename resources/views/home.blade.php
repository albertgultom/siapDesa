@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
        
    </div>
    <div>
            <table id="posttable">
                    {{-- <table id="posttable" class="table table-borderless table-data3"> --}}
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>tanggal</th>
                          <th>tipe</th>
                          <th>judul</th>
                          <th>status</th>
                          {{-- <th>price</th>
                          <th style="width: 1px;
                          padding-left: unset;
                          padding-right: unset;
                          text-align: center;">Tampil</th> --}}
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
// $(document).ready(function() {
  $("#posttable").DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ route('posts') }}',
    columns: [
      {data: 'id', name: 'id'},
      {data: 'updated_at', name: 'updated_at'},
      {data: 'type.name', name: 'type_id'},
      {data: 'name', name: 'name'},
      {data: 'active', name: 'active'}
    ]
  });
// });
</script>
@endpush