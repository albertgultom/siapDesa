{{-- Pustaka Berita dan Galeri --}}
@extends('layouts.public')

@section('content')
<ul class="nav nav-middle d-flex flex-nowrap text-nowrap bg-light">
  <li class="nav-item">
    <a class="nav-link p-3" href="/artikel">Warta Berita</a>
  </li>
  {{-- <li class="nav-item">
    <a class="nav-link p-3" href="{{route('soon')}}">Daftar Agenda</a>
  </li> --}}
  <li class="nav-item">
    <a class="nav-link p-3" href="{{route('galeri', ['content' => 'photo'])}}">Galeri Foto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link p-3 disabled" href="{{route('soon')}}">Galeri Video</a>
  </li>
  <li class="nav-item">
  <a class="nav-link p-3" href="{{route('produk-hukum')}}">Produk Hukum</a>
  </li>  
</ul>

<section class="container-fluid nav-section pt-3">
  @yield('pustaka')
</section>
@endsection