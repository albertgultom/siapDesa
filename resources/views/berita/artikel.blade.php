@extends('layouts.pustaka')

@section('pustaka')
<div class="row">
  <div class="col-lg-3">
    <ul class="list-group list-group-flush">
      <li class="list-group-item list-group-item-primary">WARTA BERITA</li>
      @foreach ($tags as $item)
        <li class="list-group-item" href="">{!!$item->name!!}</li>
      @endforeach
    </ul>
  </div>
  <div class="col-lg-9">
      <div class="row">
        @foreach ($posts as $item)            
      <a href="{{route('artikel.lihat',$item->id)}}" class="col-12 col-lg-4 mb-2 berita">
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
      <nav aria-label="Page navigation example" style="padding-top: 20px;">
          <ul class="pagination justify-content-end">
              <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
              <a class="page-link" href="#">Next</a>
              </li>
          </ul>
      </nav>
  </div>
</div>
@endsection