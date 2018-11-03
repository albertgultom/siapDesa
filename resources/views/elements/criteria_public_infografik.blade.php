<ol class="ml-3">
@foreach ($criterias as $k)
{{-- -- {{$loop->depth}} --}}
  <li class="mb-2">
    <span class="col-lg-6">{{$k->name}}</span> 
  </li>

    @if($k->criterias->count() > 0)
      @include('elements.criteria_public_infografik', ['criterias' => $k->criterias])
    {{-- @else
      <p class="ml-3">Tidak ada data</p> --}}
    @endif

    @if($k->tabulations->count() > 0)
    <div class="row">    
      @include('elements.tabulation_public_infografik', [
        'tabulations' => $k->tabulations,
        'id' => $k->id
      ])

      @include('elements.tabulation_detail_chart_public_infografik', [
                                                'tabulations' => $k->tabulations,
                                                'id' => $k->id])
    </div>                                                
    @endif
@endforeach
</ol>