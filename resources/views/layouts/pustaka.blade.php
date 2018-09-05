{{-- Pustaka Berita dan Galeri --}}
@extends('layouts.public')

@section('content')
<div class="nav-middle d-flex flex-nowrap text-nowrap bg-light">
  <a class="p-3" href="/artikel">Daftar Artikel</a>
  {{-- <a class="p-3" href="#">Daftar Agenda</a> --}}
  <a class="p-3" href="/foto">Galeri Foto</a>
  {{-- <a class="p-3" href="#">Galeri Video</a> --}}
</div>

<section class="container-fluid nav-section pt-3">
  @yield('pustaka')
</section>
@endsection