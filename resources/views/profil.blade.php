{{-- Profil untuk halaman publik --}}
@extends('layouts.public')

@section('content')
<div class="nav-middle d-flex flex-nowrap text-nowrap bg-light">
  <a class="p-3" href="#">Perangkat</a>
  <a class="p-3" href="#">Sejarah</a>
  <a class="p-3" href="#">Potensi</a>
  <a class="p-3" href="#">Infografik</a>
  <a class="p-3" href="#">Lembaga</a>
</div>

<section class="container-fluid nav-section">  
  <h3>Daftar Informasi Desa</h3>
</section>
@endsection

@push('scripts')
@endpush