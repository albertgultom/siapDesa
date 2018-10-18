@extends('layouts.pustaka')

@section('pustaka')
<div class="row">
  <div class="col-lg-3">
    <ul class="list-group list-group-flush">
      <li class="list-group-item list-group-item-primary">KATEGORI</li>
      @foreach ($tags as $item)
        <a href="{{route('artikel',['tag' => $item->name])}}">
          <li class="list-group-item" >{!!$item->name!!}</li>
        </a>
      @endforeach
    </ul>
  </div>
  <div class="col-lg-9">
      <div class="row">
        @foreach ($posts as $item)            
          <a href="{{route('artikel.lihat',$item->name)}}" class="col-12 col-lg-4 mb-2 berita">
            <div class="card features">
              <img class="card-img-top" src="{{'/storage/images//'.$item->image}}" alt="Card image cap">
              <div class="card-body">
                <div class="media">
                  <div class="media-body">
                      <h4 class="card-title">{!! $item->name !!}</h4>
                      <small class="text-right">{!! $item->updated_at !!}</small>
                      <div>
                        @foreach ($item->tags as $tag)
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
     <div class="text-center">{!!$posts->appends(Request::except('page'))->links()!!}</div>
  </div>
</div>
@endsection