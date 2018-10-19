{{-- Pelayanan untuk halaman publik --}}
@extends('layouts.public')

@section('content')
<ul class="nav nav-middle d-flex flex-nowrap text-nowrap bg-light">
  <li class="nav-item">
    <a class="nav-link p-3" href="/pelayanan">Daftar Pelayanan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link p-3" href="/trace_service">Status Pelayanan</a>
  </li>
  <li class="nav-item">
      <a class="nav-link p-3 disabled" href="#">Layanan Cepat Tanggap</a>
    </li>
</ul>

<section class="container-fluid nav-section">
  @yield('layanan')
</section>
@endsection
