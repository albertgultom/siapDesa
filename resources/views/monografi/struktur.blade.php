@extends('layouts.profil')

@section('profil')
<div id="identitas">
  <h4 class="title">Struktur Organisasi Desa</h4>
  <div class="mb-3">
    <img src="{{asset('storage\images\\'.$row['image_structure'])}}" alt="logo" class="img-fluid">
  </div>
</div>

@endsection