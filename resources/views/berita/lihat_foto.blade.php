@extends ('layouts.pustaka')

@section('pustaka')
<div class="row mt-3">
  <div class="col-md-9" style="border-right:solid 1px #eee;">
    <h4 class="mb-3">List Galeri foto</h4>
    <div class="gallery-photos mb-5"> 
      <span class="d-block p-2 mb-2 bg-primary text-white">{!!$query->name!!}</span>
        @foreach ($query->contents as $item)
      <div class="d-flex flex-row flex-wrap">
        <a 
          href="{{asset('storage/photos/'.$item['image'])}}"
          data-fancybox="gallery"
          data-caption="">
          <img src="{!!asset('storage/photos/'.$item['image'])!!}" alt="">
        </a>
        @endforeach
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-md-3">
    <h4>Daftar</h4>
    <ul>
    <li>{!!$query->name!!}</li>
    </ul>
</div>
@endsection

       