{{-- Pustaka Berita dan Galeri --}}
@extends('layouts.public')

@section('content')
<ul class="nav nav-middle d-flex flex-nowrap text-nowrap bg-light">
  <li class="nav-item">
    <a class="nav-link p-3" href="/artikel">Warta Berita</a>
  </li>
  <li class="nav-item">
    <a class="nav-link p-3 disabled" href="#">Daftar Agenda</a>
  </li>
  <li class="nav-item">
    <a class="nav-link p-3" href="/foto">Galeri Foto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link p-3 disabled" href="#">Galeri Video</a>
  </li>
  <li class="nav-item">
    <a class="nav-link p-3 disabled" href="/artikel">Produk Hukum</a>
  </li>  
</ul>

<section class="container-fluid nav-section pt-3">
  @yield('pustaka')
</section>
@endsection