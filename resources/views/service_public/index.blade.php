@extends('layouts.pelayanan')

@section('layanan')
<div class="row">
  <div class="col-lg-3">
    <ul class="list-group list-group-flush">
      @foreach ($tags as $item)
      <a href="{{route('pelayanan.index',['oid' => $item->id,'tag' => $item->name])}}">
    <li class="list-group-item" >{!!$item->name!!}</li>
      </a>
      @endforeach
    </ul>
      </a>
  </div>
  <div class="col-lg-9">

  </div>
</div>
@endsection