<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'appDesa') }}</title>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
  <!-- Styles -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="30">
  <!-- NAVBAR -->
  <div class="nav-menu fixed-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-dark navbar-expand-lg">
            <a class="navbar-brand" href="index.html"><img src="logo.png" class="img-fluid" alt="logo"></a>
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
                <li class="nav-item"> <a class="nav-link active" href="#home">AWAL<span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"> <a class="nav-link" href="#features">BERITA</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#gallery">PELAYANAN</a> </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">PROFIL</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Desa</a>
                    <a class="dropdown-item" href="#">Sejarah</a>
                    <a class="dropdown-item" href="#">Visi dan Misi</a>
                    <a class="dropdown-item" href="#">Struktur Organisasi</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">POTENSI</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Alam</a>
                    <a class="dropdown-item" href="#">Sarana Prasarana</a>
                    <a class="dropdown-item" href="#">Penduduk</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="#">Fisik</a>
                  </div>
                </li>
                <li class="nav-item"> <a class="nav-link" href="#">PRODUK HUKUM</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#contact">KONTAK</a> </li>
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
      <div class="row">
        <div class="col-sm-8">
            <h4>SITUS RESMI</h4>
            <h1>DESA TELUK BAYUR</h1>
            <p>KEC. PALMATAK - KEPULAUAN ANAMBAS</p>
            <p>PROVINSI KEPULAUAN RIAU</p>
        </div>
        <div class="col-sm-4 img-holder">
          <img src="{!!asset('storage/images/logoanambas.png')!!}" alt="logo" class="img-fluid" style="height: 250px;">
        </div>
      </div>
    </div>
  </header>
  <!-- CONTAINER -->
  @yield('content')
  <!-- CONTAINER -->
  <div class="section bg-gradient">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <span class="d-block p-2 text-warning border border-warning rounded">LINK TERKAIT</span>
          <div class="row p-2 text-center">
            <div class="col-md-6 mb-2">
              <img src="{!!asset('storage/images/banner221.jpg')!!}" alt="..." class="img-thumbnail">
            </div>
            <div class="col-md-6 mb-2">
              <img src="{!!asset('storage/images/banner2912.jpg')!!}" alt="..." class="img-thumbnail">
            </div>
            <div class="col-md-6 mb-2">
              <img src="{!!asset('storage/images/sakip.png')!!}" alt="..." class="img-thumbnail">
            </div>
            <div class="col-md-6 mb-2">
              <img src="{!!asset('storage/images/banner311.jpg')!!}" alt="..." class="img-thumbnail">
            </div>
            <div class="col-md-6 mb-2">
              <img src="{!!asset('storage/images/monev.jpg')!!}" alt="..." class="img-thumbnail">
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <span class="d-block p-2 text-warning border border-warning rounded">INFO MASYARAKAT</span>
            <ul class="list-unstyled">
                <li class="media mt-2">
                    <span class="ti-themify-favicon-alt ti-2x text-primary mr-2"></span>
                    <div class="media-body">
                        <span class="text-primary mr-2">Dr. Irawati :</span>
                        <p class="text-white d-block text-truncate" style="max-width: 250px;">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                        <small class="text-muted float-right"><span class="ti-calendar mr-2"></span>27 Agustus 2018</small>
                    </div>
                </li>
                <li class="media mt-2">
                        <span class="ti-themify-favicon-alt ti-2x text-primary mr-2"></span>
                        <div class="media-body">
                            <span class="text-primary mr-2">Dr. Irawati :</span>
                            <p class="text-white d-block text-truncate" style="max-width: 250px;">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                            <small class="text-muted float-right"><span class="ti-calendar mr-2"></span>27 Agustus 2018</small>
                        </div>
                    </li>
            </ul>
        </div>
        <div class="col-md-4">
              <span class="d-block p-2 text-warning border border-warning rounded">AREA LOKASI</span>
              <div class="embed-responsive embed-responsive-4by3 mt-2">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127457.5356666146!2d106.23490044964961!3d3.3383160113283377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31c20c4b6da2183b%3A0x9ed40dd677529b3a!2sPal+Matak%2C+Kabupaten+Kepulauan+Anambas%2C+Kepulauan+Riau!5e0!3m2!1sid!2sid!4v1533299749424" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
              </div>
      </div>
    </div>
  </div>
  <!-- CONTACT -->
  <div class="light-bg py-5" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-center text-lg-left">
          <p class="mb-2"> <span class="ti-location-pin mr-2"></span> 1485 Pacific St, Brooklyn, NY 11216 USA</p>
          <div class=" d-block d-sm-inline-block">
            <p class="mb-2">
              <span class="ti-email mr-2"></span> <a class="mr-4" href="mailto:support@telukbayur.id">support@telukbayur.id</a>
            </p>
          </div>
          <div class="d-block d-sm-inline-block">
            <p class="mb-0">
              <span class="ti-headphone-alt mr-2"></span> <a href="tel:51836362800">518-3636-2800</a>
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
      <small>Copyright © 2018. ALL RIGHTS RESERVED. Maintenance by <a href="https://siapdesa.id">siapDesa</a> - v1.0.0</small>
    </p>
    <small>
      <a href="#" class="m-2">PRESS</a>
      <a href="#" class="m-2">TERMS</a>
      <a href="#" class="m-2">PRIVACY</a>
    </small>
  </footer>
  <!-- Custom JS -->
  <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <script src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>
</body>
</html>