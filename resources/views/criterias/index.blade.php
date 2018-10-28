@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5 text-uppercase">daftar potensi <a href="{{route('criteria.create')}}" class="btn btn-info mt-2 ml-5 text-uppercase">Formasi Daftar Potensi</a></h3>        
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
                    </h5>
                </div>
                <div id="collapse{{$k['id']}}" class="collapse show" aria-labelledby="heading{{$k['id']}}" data-parent="#accordionExample">
                    <div class="card-body">
                        @if($k->criterias->count() > 0)
                            @include('elements.criteria', ['criterias' => $k->criterias])
                        @endif

                        @if($k->tabulations->count() > 0)
                            @include('elements.tabulation', ['tabulations' => $k->tabulations, 'criterias' => $k->criterias])
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection