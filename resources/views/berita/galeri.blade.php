@extends('layouts.pustaka')

@section('pustaka')
<div class="row">
  <div class="col-lg-3">
    <ul class="list-group list-group-flush">
      <li class="list-group-item list-group-item-primary">KATEGORI</li>
      {{-- @foreach ($tags as $item)
        <a href="{{route('artikel',['tag' => $item->name])}}">
          <li class="list-group-item" >{!!$item->name!!}</li>
        </a>
      @endforeach --}}
    </ul>
  </div>
  <div class="col-lg-9"></div>
</div>
@endsection