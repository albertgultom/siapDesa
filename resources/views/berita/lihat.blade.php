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
            
            <div class="d-block p-2 mt-3" style="border-bottom: darksalmon solid 1pt;">
              <h6 class="text-info">Kolom Komentar...</h6>
            </div>
          <!-- </div> -->
        </div>
        <div class="col-lg-3">
          <div class="row">
          <div class="col mb-3">
            <span class="d-block p-2 bg-primary text-white rounded">BERITA TERKAIT</span>
            <ul class="list-unstyled ui-steps">
                <li class="media">
                    <!-- <div class="circle-icon mr-4">1</div> -->
                    <img class="mr-3" src="images/berita/Tarempak tower lam.jpg" alt="" style="height: 80px;width:120px;">
                    <div class="media-body">
                        <!-- <h5>Create an Account</h5> -->
                        <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
                        <small class="text-muted"><span class="ti-calendar mr-2"></span>27 Agustus 2018</small>
                    </div>
                </li>
                <li class="media">
                    <!-- <div class="circle-icon mr-4">1</div> -->
                    <img class="mr-3" src="images/berita/pelabuhan-letung-553x393.jpg" alt="" style="height: 80px;width:120px;">
                    <div class="media-body">
                        <!-- <h5>Create an Account</h5> -->
                        <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
                        <small class="text-muted"><span class="ti-calendar mr-2"></span>27 Agustus 2018</small>
                    </div>
                </li>
                <li class="media">
                    <!-- <div class="circle-icon mr-4">1</div> -->
                    <img class="" src="images/berita/img_article.jpg" alt="" style="height: 80px;width:120px;margin-right: 10px;">
                    <div class="media-body">
                        <!-- <h5>Create an Account</h5> -->
                        <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
                        <small class="text-muted"><span class="ti-calendar mr-2"></span>27 Agustus 2018</small>
                    </div>
                </li>
            </ul>
            <button type="button" class="btn btn-outline-secondary btn-sm float-right">lihat daftar</button>
          </div>
          
        </div>
        </div>
      </div>
    {{-- </div> --}}
  {{-- </div> --}}
  <!-- Embed Info's -->
 
  <!-- Contact -->
  

@endsection