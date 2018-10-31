@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5 text-uppercase">formasi daftar potensi</h3>        
        <a href="/potency/criteria/branch/0" class="btn btn-info float-right"><i class="fas fa-code-branch"></i> Buat Kepala</a>        
        <hr class="line-seprate">
      </div>
    </div>
  </div>
</section>
<!-- SECTION BODY -->
<section class="statistic-chart">
    <div class="container">
        <div class="accordion" id="accordionExample">
            @foreach ($data as $k)
            {{-- -- {{$loop->depth}} --}}
            <div class="card mb-0">
                <div class="card-header" id="heading{{$k['id']}}">
                    <h5 class="mb-0">
                        <button 
                            class="btn btn-link" 
                            type="button" 
                            data-toggle="collapse" 
                            data-target="#collapse{{$k['id']}}" 
                            aria-expanded="true" 
                            aria-controls="collapse{{$k['id']}}">
                            {{$k['name']}}
                        </button>
                        <a href="/potency/criteria/branch/{{$k->id}}" class="btn btn-info float-right"><i class="fas fa-code-branch"></i> Buat Cabang</a>                        
                    </h5>
                </div>
                <div id="collapse{{$k['id']}}" class="collapse" aria-labelledby="heading{{$k['id']}}" data-parent="#accordionExample">
                    <div class="card-body">
                        @if($k->criterias->count() > 0)
                            @include('elements.criteria_create', ['criterias' => $k->criterias])
                        @endif

                        @if($k->tabulations->count() > 0)
                            @include('elements.tabulation', ['tabulations' => $k->tabulations])
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection