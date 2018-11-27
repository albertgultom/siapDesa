@extends('layouts.pustaka')
@php
//  dd($content);
@endphp
@section('pustaka')
<div class="row">
  <div class="col-lg-3">
    <ul class="list-group list-group-flush">
      <li class="list-group-item list-group-item-primary">KATEGORI</li>
      @foreach ($tags as $item)
          <a href="{{route('galeri',['content' => $content, 'tag' => $item->name])}}">
            <li class="list-group-item" >{!!$item->name!!}</li>
          </a>
      @endforeach
    </ul>
  </div>
  <div class="col-lg-9">
    <div class="row">
      @foreach ($data as $item)
        <a href="{{route('galeri.lihat',['content' => $content, 'name' => $item['name']])}}" class="col-12 col-lg-4 mb-2 berita">
          <div class="card features">
            @if($content == 'photo')
              @if($item->contents->count() > 0)
                @foreach ($item->contents as $k => $v)
                  @if($k == 0)
                    <img class="card-img-top bg-gradient-ver"
                      src="{{asset('/storage/photos/'.$v->image)}}"
                      style="object-fit: contain;"
                      alt="Card image cap">
                  @endif
                @endforeach
              @else
                <img class="card-img-top bg-gradient-ver"
                  src="{{asset('/storage/images/mark.png')}}"
                  style="object-fit: contain;"
                  alt="Card image cap">
              @endif
            @elseif($content == 'video')
              @if($item->contents->count() > 0)            
                @foreach ($item->contents as $k => $v)
                  @if($k == 0)
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe 
                        class="embed-responsive-item" 
                        src="{{$v->video}}" 
                        allowfullscreen></iframe>
                    </div>                  
                  @endif
                @endforeach
              @else
                <!-- <img class="card-img-top bg-gradient-ver"
                  src="{{asset('/storage/images/mark.png')}}"
                  style="object-fit: contain;"
                  alt="Card image cap"> -->
              @endif            
            @endif
            <div class="card-body">
              <div class="media">
                <div class="media-body">
                  <h4 class="card-title">{!!$item['name']!!}</h4>
                  <small class="text-right">{!!$item['updated_at']!!}</small>
                  <div>
                    @foreach ($item['tags'] as $tag)
                      <small class="badge badge-pill badge-secondary">{!! $tag->name !!}</small> 
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      @endforeach 
    </div>
    <div>{{ $data->appends(Request::except('page'))->links() }}</div>
  </div>
</div>
@endsection