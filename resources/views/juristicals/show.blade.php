@extends('layouts.pustaka')

@section('pustaka')
<div class="container">
  <div class="d-block mb-3" style="border-bottom: darksalmon solid 1pt;">
    <h6 class="text-info">{!!$data->name!!}</h6>
  </div>

  <div class="detail_body mb-3" style="border-bottom: darksalmon solid 1pt;">{!!$data->detail!!}</div>
  
  <div class="mb-3">  
    <a href="{{asset('/storage/juristicals/'.$data->file)}}" download>Download Lampiran {!!$data->file!!}</a>
  </div>
</div>
@endsection

@push('styles')
<style>
  .detail_body p{
    color: #000;
  }
</style>
@endpush