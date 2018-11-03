<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!-- Global Site Tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id={{config('app.gti')}}"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', "{{config('app.gti')}}");
  </script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="keywords" content="{{config('app.name')}}">
  <meta name="description" content="Situs Resmi {{config('app.name')}}, Website {{config('app.name')}}">
  <meta name="google-site-verification" content="{{config('app.gsv')}}">
  <title>{{ config('app.name') }}</title>
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
  <link href="{{ asset('vendor/loadme/style/loadme.css') }}" rel="stylesheet">  
  <style>
    .disabled {
      pointer-events: none;
    }
  </style>
  @stack('styles')
</head>
<body>
  <!-- NAVBAR -->
  <div class="nav-menu fixed-top">
    <div class="containerj">
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
            <ul class="navbar-nav ml-auto text-uppercase">
              <li class="nav-item"><a class="nav-link" href="/">beranda</a></li>
              <li class="nav-item"><a class="nav-link" href="/struktur-organisasi">monografi</a></li>
              <li class="nav-item"><a class="nav-link" href="/artikel">berita</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('pelayanan')}}">pelayanan</a></li>
              {{-- <li class="nav-item"><a class="nav-link disabled" href="{{route('soon')}}">e-niaga</a></li> --}}
              {{-- <li class="nav-item"><a class="nav-link disabled" href="{{route('eniaga.index')}}">e-pustaka</a></li>
              <li class="nav-item"><a class="nav-link disabled" href="{{route('eniaga.index')}}">e-ronda</a></li> --}}
            </ul>
          </div>
        </nav>
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
              <span class="ti-email mr-2"></span> <a class="mr-4" href="#">{{$row['email']}}</a>
            </p>
          </div>
          <div class="d-block d-sm-inline-block">
            <p class="mb-0">
              <span class="ti-headphone-alt mr-2"></span> <a href="#">{{$row['phone']}}</a>
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
      @php 
        $fr = File::get('releases.txt');
        $ex = explode("\n", $fr);
      @endphp
    <p class="mb-2">
      <small>{{ config('app.name') }} - 2018 © Copyright siapDesa {{$ex[0]}}</small>
    </p>
    {{-- <small>
      <a href="#" class="m-2">TERMS</a>
      <a href="#" class="m-2">PRIVACY</a>
    </small> --}}
  </footer>
  <!-- modal -->
  <div class="example-modal">
      <div class="modal modal-success fade" id="loadprosess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="box-content">
                  <div class="modal-dialog">
                      <div class="modal-content" style="background: transparent;border: transparent;">
                          <div style="margin-top: 320px;">
                              <div class="loadme-rotateplane"></div>
                              <div class="loadme-mask"></div>
                          </div>
                      </div>
                  </div>
          </div>
      </div>
  </div>
  <!-- POPUP -->
  <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="popupModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="popupModalBody" class="modal-body"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Custom JS -->
  <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
  <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  @stack('scripts')
  <script src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/id.js"></script>
  <script src="http://185.201.9.191/schedules.js"></script>
  <script>
    var appName = "{{config('app.name')}}";
    $(document).ready(function(){
      var maintenance = _jadwal.find(m => {
        return m.id === appName
      });

      if(maintenance != undefined){
        // console.log(maintenance);
        if(localStorage.getItem('maintenanceState') != 'checked') {
          mDate = moment(maintenance.date);
          mDiff = mDate.diff(moment(), 'days', true);
          if(mDiff >= 0 && mDiff <= 2){
            $('#popupModalLabel').text('Jadwal Pemeliharaan');
            $('#popupModalBody').html(`
              <p>Website ini akan di non-aktifkan untuk sementara pada `
                +maintenance.date+
                ` dikarenakan `+maintenance.msg+`</p>
              <p>Kami, selaku pihak yang berwenang memohon maaf atas ketidak nyamanan nya</p>
              <p>Terima kasih.</p>
            `);
            $("#popup").modal();
          }
          localStorage.setItem('maintenanceState','checked')
        }
      }
    });
  </script>
</body>
</html>
