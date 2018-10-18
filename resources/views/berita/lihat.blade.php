@extends('layouts.pustaka')

@section('pustaka')
<div class="row">
  <div class="col-lg-9 mb-3">
    <div class="d-block p-2 mb-3" style="border-bottom: darksalmon solid 1pt;">
      <h6 class="text-info">{!!$post->name!!}</h6>
    </div>

    <img src="{{asset('storage\images\\'.$post['image'])}}" class="img-fluid mx-auto d-block mb-3">
    
    <div class="p-2">{!!$post->body!!}</div>
    
    <div class="d-block p-2 mt-3 text-right" style="border-bottom: darksalmon solid 1pt;">
      <small>{!!$post->updated_at!!}, {!!$post->user->name!!}</small>
    </div>

    <span>Kategori :</span>
    @foreach ($post->tags as $tag)
      <small class="badge badge-pill badge-secondary">{!! $tag->name !!}</small> 
    @endforeach
  </div>
  <div class="col-lg-3">
    <div class="row">
      <div class="col mb-3">
        <span class="d-block p-2 bg-primary text-white rounded">BERITA TERKAIT</span>
        
        <ul class="list-unstyled ui-steps">
          @foreach ($berita as $item)
            <li class="media">
              <img class="mr-3" src="{{asset('storage\images\\'.$item['image'])}} " alt="" style="height: 80px;width:120px;">
              <div class="media-body">
                <a href="{{route('artikel.lihat',$item->name)}}">
                  <p class="text-info terkait">
                  {!!$item->name!!}
                  </p>
                </a>
                <small class="text-muted"><span class="ti-calendar mr-2"></span>{!!$item->updated_at!!}</small>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
  .terkait{
    font-weight: 100;
  }
  .terkait:hover{
    font-weight: normal;
  }
</style>
@endpush