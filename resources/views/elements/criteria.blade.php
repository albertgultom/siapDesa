<ol class="ml-3">
@foreach ($criterias as $k)
{{-- -- {{$loop->depth}} --}}
  <li class="mb-2">{{$k->name}}</li>
    @if($k->criterias->count() > 0)
      @include('elements.criteria', ['criterias' => $k->criterias])
    {{-- @else
      <p class="ml-3">Tidak ada data</p> --}}
    @endif

    @if($k->tabulations->count() > 0)
      @include('elements.tabulation', [
        'tabulations' => $k->tabulations,
        'id' => $k->id
      ])
    @endif
@endforeach
</ol>