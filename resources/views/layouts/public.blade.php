<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="shorcut icon" href="{{ asset('storage/images/favicon.png') }}">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
  <!-- Styles -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.css" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/seamless.css') }}" rel="stylesheet">
</head>
<body>
  <!-- NAVBAR -->
  <div class="nav-menu fixed-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-dark navbar-expand-lg">
            <a class="navbar-brand" href="/">
              <img src="{{asset('storage/images/logo.png')}}" class="img-fluid" alt="logo">
            </a>
            <button 
              class="navbar-toggler" 
              type="button" 
              data-toggle="collapse" 
              data-target="#navbar" 
              aria-controls="navbar" 
              aria-expanded="false" 
              aria-label="Toggle navigation"> 
                <span class="navbar-toggler-icon"></span> 
            </button>
            <div class="collapse navbar-collapse" id="navbar">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"> <a class="nav-link" href="/">BERANDA</a></li>
                <li class="nav-item"> <a class="nav-link" href="/struktur-organisasi">MONOGRAFI</a></li>
                <li class="nav-item"> <a class="nav-link" href="/artikel">BERITA</a></li>
                <li class="nav-item"> <a class="nav-link disabled" href="/layanan">PELAYANAN</a></li>
                {{-- <li class="nav-item"> <a class="nav-link disabled" href="/produk">PRODUK</a> </li> --}}
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- HEADER -->
  <header class="bg-gradient" id="home">
    <div class="container-fluid">
      <div class="row custom-header">
        <div class="col-sm-8" >
            

            <h4>SITUS RESMI</h4>
            <h1 class="text-uppercase">{{$row['name']}}</h1>
            <p class="text-uppercase">{{$row['subdistrict']}} - {{$row['district']}}</p>
            <p class="text-uppercase">{{$row['province']}}</p>
        </div>
        <div class="col-sm-4 mb-4">
          <img src="{{asset('storage\images\\'.$row['image_profile'])}}" alt="logo" class="img-fluid">
        </div>
      </div>
    </div>
  </header>
  <!-- CONTAINER -->
  @yield('content')
  <!-- CONTAINER -->
  <div class="section bg-gradient">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 d-block mx-auto mb-2">
          <div id="gpr-kominfo-widget-container"></div>
        </div>
        {{-- <div class="col-lg-5 col-md-4">
          <span class="d-block p-2 text-warning border border-warning rounded">LINK TERKAIT</span>
          <div class="row p-2 text-center">
            <div class="col-sm-6 mb-2">
              <img src="{!!asset('storage/images/banner221.jpg')!!}" alt="..." class="img-thumbnail">
            </div>
            <div class="col-sm-6 mb-2">
              <img src="{!!asset('storage/images/banner2912.jpg')!!}" alt="..." class="img-thumbnail">
            </div>
            <div class="col-sm-6 mb-2">
              <img src="{!!asset('storage/images/sakip.png')!!}" alt="..." class="img-thumbnail">
            </div>
            <div class="col-sm-6 mb-2">
              <img src="{!!asset('storage/images/banner311.jpg')!!}" alt="..." class="img-thumbnail">
            </div>
            <div class="col-sm-6 mb-2">
              <img src="{!!asset('storage/images/monev.jpg')!!}" alt="..." class="img-thumbnail">
            </div>
          </div>
        </div> --}}
        <div class="col-lg-8 col-md-6">
          <span class="d-block p-2 text-warning border border-warning rounded">AREA LOKASI</span>
          <img src="{{asset('storage\images\\'.$row['map'])}}" class="img-fluid d-block mx-auto mt-2" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- CONTACT -->
  <div class="light-bg py-5" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-center text-lg-left">
          <p class="mb-2"> <span class="ti-location-pin mr-2"></span> {{$row['zip_code']}} {{$row['subdistrict']}}, {{$row['district']}}, {{$row['province']}}</p>
          <div class=" d-block d-sm-inline-block">
            <p class="mb-2">
              <span class="ti-email mr-2"></span> <a class="mr-4" href="mailto:support@telukbayur.id">{{$row['email']}}</a>
            </p>
          </div>
          <div class="d-block d-sm-inline-block">
            <p class="mb-0">
              <span class="ti-headphone-alt mr-2"></span> <a href="tel:51836362800">{{$row['phone']}}</a>
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="social-icons">
            <a href="#"><span class="ti-facebook"></span></a>
            <a href="#"><span class="ti-twitter-alt"></span></a>
            <a href="#"><span class="ti-instagram"></span></a>
            <a href="#"><span class="ti-google"></span></a>
            <a href="#"><span class="ti-youtube"></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- FOOTER -->
  <footer class="my-5 text-center">
    <p class="mb-2">
      <small>{{ config('app.name') }} - 2018 © Copyright siapDesa v1.0.0</small>
    </p>
    {{-- <small>
      <a href="#" class="m-2">TERMS</a>
      <a href="#" class="m-2">PRIVACY</a>
    </small> --}}
  </footer>
  <!-- Custom JS -->
  <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
  <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  @stack('scripts')
  <script src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>
</body>
</html>