<ol class="ml-3">
@foreach ($criterias as $k)
{{-- -- {{$loop->depth}} --}}
    <li class="mb-2">
      {{$k->name}} 
      @if($public == 0)      
      <a href="/potency/criteria/branch/{{$k->id}}" class="btn btn-info float-right"><i class="fas fa-code-branch"></i> Buat Cabang</a>
      @endif  
    </li>  
  <hr>
    @if($k->criterias->count() > 0)
      @include('elements.criteria_create', ['criterias' => $k->criterias])
    {{-- @else
      <p class="ml-3">Tidak ada data</p> --}}
    @endif

    @if($k->tabulations->count() > 0)
      @include('elements.tabulation_create', [
        'tabulations' => $k->tabulations,
        'id' => $k->id
      ])
    @endif    
@endforeach
</ol>

@push('scripts')
<script>
</script>
@endpush