@extends('layouts.pustaka')

@section('pustaka')
<div class="container">
  <div class="row">
    @if($data->count() == 0)
    <div class="col-12">
        <div class="card features">
          <div class="card-body">
            <div class="media">
              <span class="ti-face-sad gradient-fill ti-3x mr-3"></span>
              <div class="media-body">
                <h4 class="card-title"><span class="ti-info-alt"></span> Mohon maaf, data belum tersedia...</h4>
              </div>
            </div>
          </div>
        </div>
    </div>
    @else
      @foreach ($data as $item)
        <div class="col-12 col-lg-4">
          <a href="{{route('produk-hukum',$item->name)}}" class="berita">
            <div class="card features">
              <div class="card-body">
                <div class="media">
                  <span class="ti-announcement gradient-fill ti-3x mr-3"></span>
                  <div class="media-body">
                    <h4 class="card-title">{!!str_limit($item->name, $limit=35, $end='...')!!}</h4>
                    <small class="text-right">{!! $item->updated_at->format('d-M-Y') !!}</small>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
      <div class="col-12">{!!$data->links()!!}</div>
    @endif
  </div>
</div>
@endsection

@push('styles')
<style>
  .card {
    background-color: #f8f8ff;
  }
  .card-body {
    padding: 0 !important;
  }
  .media span {
    padding-left: 1rem;
    padding-top: 1rem;
  }
  .media-body {
    padding: 1rem 0 0 1.2rem;
    background-color: #fff;
  }
  h4.card-title {
    min-height: 3rem;
  }
</style>
@endpush