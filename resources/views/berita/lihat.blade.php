@extends('layouts.pustaka')

@section('pustaka')

  <!-- Container -->
  {{-- <div class="section light-bg" id="features"> --}}
    {{-- <div class="container-fluid"> --}}
      <div class="row">
        <div class="col-lg-9 mb-3">
          <!-- <div class="container"> -->
            <div class="d-block p-2 mb-3" style="border-bottom: darksalmon solid 1pt;">
              
            <h6 class="text-info">{!!$post->name!!}</h6>
            </div>
              
            <img src="{{asset('storage\images\\'.$post['image'])}}" class="img-fluid mx-auto d-block mb-3" >
            <div class="p-2">{!!$post->body!!}</div>
            
            {{-- <div class="d-block p-2 mt-3" style="border-bottom: darksalmon solid 1pt;">
              <h6 class="text-info">Kolom Komentar...</h6>
            </div> --}}
          <!-- </div> -->
        </div>
        <div class="col-lg-3">
          <div class="row">
          <div class="col mb-3">
            <span class="d-block p-2 bg-primary text-white rounded">BERITA TERKAIT</span>
            
            <ul class="list-unstyled ui-steps">
                @foreach ($berita as $item)
                <li class="media">
                  
                    <!-- <div class="circle-icon mr-4">1</div> -->
                    <img class="mr-3" src="{{asset('storage\images\\'.$item['image'])}} " alt="" style="height: 80px;width:120px;">
                    <div class="media-body">
                        <!-- <h5>Create an Account</h5> -->
                    <a href="{{route('artikel.lihat',$item->id)}}">
                      <h4>
                      {!!$item->name!!}
                      </h4>
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
    {{-- </div> --}}
  {{-- </div> --}}
  <!-- Embed Info's -->
 
  <!-- Contact -->
  

@endsection