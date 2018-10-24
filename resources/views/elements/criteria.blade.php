<ol class="ml-3">
@foreach ($criterias as $k)
{{-- -- {{$loop->depth}} --}}
  <li class="mb-2">
    <span class="col-lg-6">{{$k->name}}</span> 
    @if($k->tree == 4)    
    <span class="col-lg-6 pull-right">
      Total :
      @include('elements.tabulation_counter', [
                                              'tabulations' => $k->tabulations,
                                              'id' => $k->id])
    </span>
    @endif
  </li>

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