<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Fontfaces CSS-->
  <link href="{{ asset('css/font-face.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
  <!-- Bootstrap CSS-->
  <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
  <!-- Vendor CSS-->
  <link href="{{ asset('vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('vendor/wow/animate.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('vendor/slick/slick.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('css/slimselect.min.css') }}" rel="stylesheet" media="all">
  <!-- Datatables -->
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css" rel="stylesheet" type="text/css" >
  <!-- Main CSS-->
  <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" media="all">
  @stack('styles')
</head>
<body class="animsition">
  <div class="page-wrapper">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop3 d-none d-lg-block">
      <div class="section__content section__content--p35">
        <div class="header3-wrap">
          <div class="header__logo">
              <a href="#">
                  <img src="{{asset('storage/images/logo.png')}}" alt="CoolAdmin" />
              </a>
          </div>
          <div class="header__navbar">
            <ul class="list-unstyled">
              <li class="has-sub">
                    <a href="#">
                        <i class="fas fa-list-alt"></i>Artikel
                        <span class="bot-line"></span>
                    </a>
                    <ul class="header3-sub-list list-unstyled">
                        <li>
                            <a href="/post">Berita</a>
                        </li>
                        <li>
                            <a href="/tag">Kategori</a>
                        </li>
                        <li>
                            <a href="/type">Tipe</a>
                        </li>
                        <li>
                            <a href="{{route('gallery.index', ['content' => 'photo'])}}">Galeri Photo</a>
                        </li>
                        <li>
                            <a href="{{route('gallery.index', ['content' => 'video'])}}">Galeri Video</a>
                        </li>
                    </ul>
                </li>
              <li class="has-sub">
                  <a href="#">
                      <i class="fas fa-map-marker"></i>Profil
                      <span class="bot-line"></span>
                  </a>
                  <ul class="header3-sub-list list-unstyled">
                        <li>
                            <a href="/apparatus">Perangkat Desa</a>
                        </li>
                      <li>
                          <a href="/profil/desa">Desa</a>
                      </li>
                      <li>
                          <a href="/profil/sejarah">Sejarah</a>
                      </li>
                      <li>
                          <a href="/profil/vismis">Visi dan Misi</a>
                      </li>
                      <li>
                          <a href="/profil/struktur">Struktur Organisasi</a>
                      </li>
                      <li>
                        <a href="/profil/map">Map</a>
                    </li>
                  </ul>
              </li>
              <li class="has-sub">
                  <a href="#">
                      <i class="fas fa-signal"></i>Potensi
                      <span class="bot-line"></span>
                  </a>
                  <ul class="header3-sub-list list-unstyled">
                      <li>
                          <a href="index.html">Dashboard 1</a>
                      </li>
                  </ul>
              </li>
              <li class="has-sub">
                <a href="#">
                    <i class="fas fa-briefcase"></i>Administrasi
                    <span class="bot-line"></span>
                </a>
                <ul class="header3-sub-list list-unstyled">
                    <li><a href="{{route('population.index')}}">Penduduk</a></li>
                    <li><a href="#">Kartu Keluarga</a></li>
                    <li><a href="{{route('occupation.index')}}">Master Pekerjaan</a></li>
                    <li><a href="{{route('education.index')}}">Master Pendidikan</a></li>
                </ul>
              </li>
              {{-- <li>
                  <a href="table.html">
                      <i class="fas fa-university"></i>
                      <span class="bot-line"></span>Produk Hukum</a>
              </li> --}}
            </ul>
          </div>
          <div class="header__tool">
              <div class="account-wrap">
                  <div class="account-item account-item--style2 clearfix js-item-menu">
                      <div class="image">
                          <img src="{{asset('storage/images/icon/avatar-01.png')}}" alt="John Doe" />
                      </div>
                      <div class="content"><a class="js-acc-btn" href="#"></a></div>
                      <div class="account-dropdown js-dropdown">
                          <div class="info clearfix">
                              <div class="image">
                                  <a href="#">
                                      <img src="{{asset('storage/images/icon/avatar-01.png')}}" alt="John Doe" />
                                  </a>
                              </div>
                              <div class="content">
                                  <h5 class="name">
                                      <a href="#">john doe</a>
                                  </h5>
                                  <span class="email">johndoe@example.com</span>
                              </div>
                          </div>
                          <div class="account-dropdown__body">
                              <div class="account-dropdown__item">
                                  <a href="#">
                                      <i class="zmdi zmdi-account"></i>Account</a>
                              </div>
                              <div class="account-dropdown__item">
                                  <a href="#">
                                      <i class="zmdi zmdi-settings"></i>Setting</a>
                              </div>
                          </div>
                          <div class="account-dropdown__footer">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="zmdi zmdi-power"></i>{{ __('Logout') }}
                            </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </header>
    <!-- HEADER MOBILE-->
    <header class="header-mobile header-mobile-2 d-block d-lg-none">
      <div class="header-mobile__bar">
          <div class="container-fluid">
              <div class="header-mobile-inner">
                  <a class="logo" href="index.html">
                      <img src="{{asset('storage/images/logo.png')}}" alt="CoolAdmin" />
                  </a>
                  <button class="hamburger hamburger--slider" type="button">
                      <span class="hamburger-box">
                          <span class="hamburger-inner"></span>
                      </span>
                  </button>
              </div>
          </div>
      </div>
      <nav class="navbar-mobile">
          <div class="container-fluid">
              <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-list-alt"></i>Artikel</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="/post">Berita</a>
                        </li>
                        <li>
                            <a href="/tag">Kategori</a>
                        </li>
                        <li>
                            <a href="/type">Tipe</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-map-marker"></i>Profil</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="/apparatus">Perangkat Desa</a>
                        </li>
                        <li>
                            <a href="index.html">Dashboard 1</a>
                        </li>
                        <li>
                            <a href="index2.html">Dashboard 2</a>
                        </li>
                        <li>
                            <a href="index3.html">Dashboard 3</a>
                        </li>
                        <li>
                            <a href="index4.html">Dashboard 4</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-signal"></i>Potensi</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="index.html">Dashboard 1</a>
                        </li>
                        <li>
                            <a href="index2.html">Dashboard 2</a>
                        </li>
                        <li>
                            <a href="index3.html">Dashboard 3</a>
                        </li>
                        <li>
                            <a href="index4.html">Dashboard 4</a>
                        </li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="chart.html">
                        <i class="fas fa-users"></i>Pelayanan</a>
                </li>
                {{-- <li>
                    <a href="table.html">
                        <i class="fas fa-university"></i>Produk Hukum</a>
                </li> --}}
              </ul>
          </div>
      </nav>
    </header>
    <div class="sub-header-mobile-2 d-block d-lg-none">
        <div class="header__tool">
            <div class="account-wrap">
                <div class="account-item account-item--style2 clearfix js-item-menu">
                    <div class="image">
                        <img src="{{asset('storage/images/icon/avatar-01.png')}}" alt="John Doe" />
                    </div>
                    <div class="content">
                        <a class="js-acc-btn" href="#"></a>
                    </div>
                    <div class="account-dropdown js-dropdown">
                        <div class="info clearfix">
                            <div class="image">
                                <a href="#">
                                    <img src="{{asset('storage/images/icon/avatar-01.png')}}" alt="John Doe" />
                                </a>
                            </div>
                            <div class="content">
                                <h5 class="name">
                                    <a href="#">john doe</a>
                                </h5>
                                <span class="email">johndoe@example.com</span>
                            </div>
                        </div>
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-account"></i>Account</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                            </div>
                        </div>
                        <div class="account-dropdown__footer">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                 <i class="zmdi zmdi-power"></i>{{ __('Logout') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">
      @include('elements.alert')
      @yield('content')
    </div>
    <!-- COPYRIGHT-->
    <section class="p-t-60 p-b-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>{{ config('app.name') }} - 2018 © Copyright <a href="https://siapdesa.id">siapDesa</a> v1.0.0</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
  <!-- Jquery JS-->
  <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
  <!-- Bootstrap JS-->
  <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
  <!-- Vendor JS       -->
  <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
  <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
  <script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
  <script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
  <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
  <script src="{{ asset('js/slimselect.min.js') }}"></script>
  <!-- Datatables -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <!-- Main JS-->
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  @stack('scripts')
</body>
</html>