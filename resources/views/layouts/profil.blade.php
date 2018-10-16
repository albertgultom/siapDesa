{{-- Profil untuk halaman publik --}}
@extends('layouts.public')

@section('content')
<ul class="nav nav-middle d-flex flex-nowrap text-nowrap bg-light">
  <li class="nav-item">
    <a class="nav-link p-3" href="/struktur-organisasi">Struktur Organisasi</a>
  </li>
  <li class="nav-item">
    <a class="nav-link p-3" href="/sejarah">Sejarah</a>
  </li>
  <li class="nav-item">
    <a class="nav-link p-3" href="{{route('soon')}}">Potensi</a>
  </li>
  <li class="nav-item">
    <a class="nav-link p-3 disabled" href="/infografik">Infografik</a>
  </li>
  <li class="nav-item">
    <a class="nav-link p-3 disabled" href="/lembaga">Lembaga</a>
  </li>
</ul>

<section data-spy="scroll" data-target="#list-profil" data-offset="0" class="container nav-section pt-3">
  @yield('profil')
</section>
@endsection