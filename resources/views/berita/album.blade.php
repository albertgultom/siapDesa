@extends('layouts.pustaka')
@php
//  dd($content);
@endphp
@section('pustaka')
<div class="row">
    <div class="col-lg-9 d-block p-2 mb-3" style="border-right:solid 1px #eee;">
      <div class="d-block p-2 mb-3" style="border-bottom: darksalmon solid 1pt;">
          <h6 class="text-info">{!!$data->name!!}</h6>
      </div>
      <div class="gallery-photos ml-md-3 mb-5">
        <div class="d-flex flex-row flex-wrap">
          @if($content == 'photo')
          @foreach ($data->contents as $item)
            <a 
              href="{!!asset('storage/photos/'.$item->image)!!}"
              data-fancybox="gallery"
              data-caption="">
              <img src="{!!asset('storage/photos/'.$item->image)!!}" alt="">
            </a>
          @endforeach
          @elseif($content == 'video')
          @foreach ($data->contents as $item)
          <div class="embed-responsive embed-responsive-4by3 col-lg-4">
                      <iframe 
                        class="embed-responsive-item" 
                        src="{{$item->video}}" 
                        allowfullscreen></iframe>
                    </div>                  
          @endforeach          
          @endif
        </div>
      </div>
    </div>
    <div class="col-lg-3 d-block">
      <div class="row">
        <div class="col mb-3">
          <span class="d-block p-2 bg-primary text-white text-uppercase rounded">Daftar Galeri</span>
          <ul class="list-group list-group-flush">
            @foreach ($list as $item)
              <a href="{{route('galeri.lihat',['content' => $content, 'name' => $item->name])}}">
                <li class="list-group-item">{!!$item->name!!}</li>
              </a>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
</div>
@endsection