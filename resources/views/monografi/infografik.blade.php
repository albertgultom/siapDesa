@extends('layouts.profil')

@section('profil')

@foreach ($criterias as $k)
{{-- -- {{$loop->depth}} --}}
  <div class="card">
    <div class="card-header">
    {{$k->name}}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$k->name}}</h5>
      <div class="card-title">
        @if($k->criterias->count() > 0)
          @include('elements.criteria_public_infografik', ['criterias' => $k->criterias])
        {{-- @else
          <p class="ml-3">Tidak ada data</p> --}}
        @endif

        @if($k->tabulations->count() > 0)
          @include('elements.tabulation_create', [
            'tabulations' => $k->tabulations,
            'id' => $k->id
          ])
        @endif         
      </div>
    </div>
  </div>
  <br/>
@endforeach
@endsection