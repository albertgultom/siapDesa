{{-- Halaman utama publik --}}
@extends('layouts.public')

@section('content')
<section>
  <div class="d-flex flex-row flex-nowrap mb-3 client-logo">
    <div class="p-3 text-center border border-warning shadow-lite">
        <img src="{!!asset('storage\apparatus\siti-aisyah.jpg')!!}" class="client-img rounded-circle" alt="">
        <div class="text-center" style="min-height: 50px;">SITI AISAH, S.IP</div>
        <div class="text-center" style="border-top:1px solid;">Kepala Desa</div>
    </div>
    <div class="p-3 text-center border border-warning shadow-lite">
        <img src="{!!asset('storage\apparatus\albumtemp-36.jpg')!!}" class="client-img rounded-circle" alt="">
        <div class="text-center" style="min-height: 50px;">ARIS SOMANTRI, S.Pd.I</div>
        <div class="text-center" style="border-top:1px solid;">Sekretaris Desa</div>
    </div>
    <div class="p-3 text-center border border-warning shadow-lite">
        <img src="{!!asset('storage\apparatus\businessman.png')!!}" class="client-img rounded-circle" alt="">
        <div class="text-center" style="min-height: 50px;">M. IQBAL AL-HAMDANI</div>
        <div class="text-center" style="border-top:1px solid;">KAUR TU & Umum</div>
    </div>
    <div class="p-3 text-center border border-warning shadow-lite">
        <img src="{!!asset('storage\apparatus\businesswoman.png')!!}" class="client-img rounded-circle" alt="">
        <div class="text-center" style="min-height: 50px;">SITI NURHASANAH, A.Md</div>
        <div class="text-center" style="border-top:1px solid;">KAUR Keuangan</div>
    </div>
    <div class="p-3 text-center border border-warning shadow-lite">
        <img src="{!!asset('storage\apparatus\man-28.png')!!}" class="client-img rounded-circle" alt="">
        <div class="text-center" style="min-height: 50px;">AS MUCLAS, ST</div>
        <div class="text-center" style="border-top:1px solid;">KAUR Perencanaan</div>
    </div>
    <div class="p-3 text-center border border-warning shadow-lite">
        <img src="{!!asset('storage\apparatus\woman-2.png')!!}" class="client-img rounded-circle" alt="">
        <div class="text-center" style="min-height: 50px;">BUMI WIRANTINA</div>
        <div class="text-center" style="border-top:1px solid;">Staf Desa</div>
    </div>
    <div class="p-3 text-center border border-warning shadow-lite">
        <img src="{!!asset('storage\apparatus\man-5.png')!!}" class="client-img rounded-circle" alt="">
        <div class="text-center" style="min-height: 50px;">DEDI SETIADI, A.Ma.Pd</div>
        <div class="text-center" style="border-top:1px solid;">Bendahara Desa</div>
    </div>
    <div class="p-3 text-center border border-warning shadow-lite">
        <img src="{!!asset('storage\apparatus\man-16.png')!!}" class="client-img rounded-circle" alt="">
        <div class="text-center" style="min-height: 50px;">BENI MULYADI</div>
        <div class="text-center" style="border-top:1px solid;">KASI Pemerintahan</div>
    </div>
    <div class="p-3 text-center border border-warning shadow-lite">
        <img src="{!!asset('storage\apparatus\man-23.png')!!}" class="client-img rounded-circle" alt="">
        <div class="text-center" style="min-height: 50px;">MASTUR</div>
        <div class="text-center" style="border-top:1px solid;">KASI Kesejahteraan</div>
    </div>
    <div class="p-3 text-center border border-warning shadow-lite">
        <img src="{!!asset('storage\apparatus\man-34.png')!!}" class="client-img rounded-circle" alt="">
        <div class="text-center" style="min-height: 50px;">AHMAD SAEPUDIN, A.Ma</div>
        <div class="text-center" style="border-top:1px solid;">KASI Pelayanan</div>
    </div>
  </div>
</section>

<div class="container-fluid bg-gradient-ver">
    <div class="sseamless">
        <div class="row card-deck pt-5 pb-5 profil seamless2">
            <div class="card m-2 rounded">
                <div class="card-header">Visi Desa</div>
                <div class="card-body">
                    
                    {!!$row['vision']!!}
                   
                </div>
            </div>
            <div class="card m-2 rounded">
                <div class="card-header">Misi Desa</div>
                <div class="card-body">
                   
                        {!!$row['mission']!!}
                    
                </div>
            </div>
            <div class="card m-2 rounded">
                <div class="card-header">Statisktik Penduduk</div>
                <div class="card-body">
                    <canvas id="chartPenduduk"></canvas>
                </div>
            </div>
            <div class="card m-2 rounded">
                <div class="card-header">Statistik Kepala Keluarga</div>
                <div class="card-body">
                    <canvas id="chartKeluarga"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="section light-bg" id="features">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3">
        <ul class="list-group list-group-flush">
          <li class="list-group-item list-group-item-primary">WARTA BERITA</li>
          <li class="list-group-item light-bg">Daerah</li>
          <li class="list-group-item light-bg">Wisata</li>
          <li class="list-group-item light-bg">Pulau</li>
          <li class="list-group-item light-bg">Infrastruktur</li>
          <li class="list-group-item light-bg">Galeri</li>
          <li class="list-group-item light-bg">Kegiatan</li>
          <li class="list-group-item light-bg">Pengumuman</li>
          <li class="list-group-item light-bg">Umum</li>
        </ul>
      </div>
      <div class="col-lg-9">
        <div class="row">
          <a href="berita.html" class="col-12 col-lg-4 mb-2 berita">
              <div class="card features">
                  <img class="card-img-top" src="images/berita/anambas_20161218_161541.jpg" alt="Card image cap">
                  <div class="card-body">
                      <div class="media">
                          <!-- <span class="ti-face-smile gradient-fill ti-3x mr-3"></span> -->
                          <div class="media-body">
                              <h4 class="card-title">Simple</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque </p>
                              <span class="badge badge-pill badge-success">Wisata</span>
                              <span class="badge badge-pill badge-success">Pulau</span>
                          </div>
                      </div>
                  </div>
              </div>
          </a>
          <div class="col-12 col-lg-4 mb-2">
              <div class="card features">
                  <img class="card-img-top" src="images/berita/ec3bd3cc-53ee-4fee-812d-2dcd2b5574ce_169.jpeg" alt="Card image cap">
                  <div class="card-body">
                      <div class="media">
                          <!-- <span class="ti-settings gradient-fill ti-3x mr-3"></span> -->
                          <div class="media-body">
                              <h4 class="card-title">Customize</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque </p>
                              <span class="badge badge-pill badge-success">Daerah</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-12 col-lg-4 mb-2">
              <div class="card features">
                  <img class="card-img-top" src="images/berita/img_article.jpg" alt="Card image cap">
                  <div class="card-body">
                      <div class="media">
                          <!-- <span class="ti-lock gradient-fill ti-3x mr-3"></span> -->
                          <div class="media-body">
                              <h4 class="card-title">Secure</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque </p>
                              <span class="badge badge-pill badge-success">Infrastruktur</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-12 col-lg-4 mb-2">
              <div class="card features">
                  <img class="card-img-top" src="images/berita/pelabuhan-letung-553x393.jpg" alt="Card image cap">
                  <div class="card-body">
                      <div class="media">
                          <!-- <span class="ti-face-smile gradient-fill ti-3x mr-3"></span> -->
                          <div class="media-body">
                              <h4 class="card-title">Simple</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque </p>
                              <span class="badge badge-pill badge-success">Umum</span>
                              <span class="badge badge-pill badge-success">Infrastruktur</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-12 col-lg-4 mb-2">
              <div class="card features">
                  <img class="card-img-top" src="images/berita/pulau-anambas.jpg" alt="Card image cap">
                  <div class="card-body">
                      <div class="media">
                          <!-- <span class="ti-settings gradient-fill ti-3x mr-3"></span> -->
                          <div class="media-body">
                              <h4 class="card-title">Customize</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque </p>
                              <span class="badge badge-pill badge-success">Wisata</span>
                              <span class="badge badge-pill badge-success">Pulau</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-12 col-lg-4 mb-2">
              <div class="card features">
                  <img class="card-img-top" src="images/berita/Tarempak tower lam.jpg" alt="Card image cap">
                  <div class="card-body">
                      <div class="media">
                          <!-- <span class="ti-lock gradient-fill ti-3x mr-3"></span> -->
                          <div class="media-body">
                              <h4 class="card-title">Secure</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque </p>
                              <span class="badge badge-pill badge-success">Infrastruktur</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <nav aria-label="Page navigation example" style="padding-top: 20px;">
          <ul class="pagination justify-content-end">
            <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div> --}}

{{-- <div class="section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-5 mb-3">
          <span class="d-block p-2 bg-dark text-white">INFO PENTING</span>
          <ul class="list-unstyled ui-steps">
              <li class="media">
                  <!-- <div class="circle-icon mr-4">1</div> -->
                  <img class="mr-3" src="images/berita/Tarempak tower lam.jpg" alt="" style="height: 120px;width:175px;">
                  <div class="media-body">
                      <!-- <h5>Create an Account</h5> -->
                      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
                      <small class="text-muted"><span class="ti-calendar mr-2"></span>27 Agustus 2018</small>
                  </div>
              </li>
              <li class="media">
                  <!-- <div class="circle-icon mr-4">1</div> -->
                  <img class="mr-3" src="images/berita/pelabuhan-letung-553x393.jpg" alt="" style="height: 120px;width:175px;">
                  <div class="media-body">
                      <!-- <h5>Create an Account</h5> -->
                      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
                      <small class="text-muted"><span class="ti-calendar mr-2"></span>27 Agustus 2018</small>
                  </div>
              </li>
              <li class="media">
                  <!-- <div class="circle-icon mr-4">1</div> -->
                  <img class="" src="images/berita/img_article.jpg" alt="" style="height: 120px;width:175px;margin-right: 10px;">
                  <div class="media-body">
                      <!-- <h5>Create an Account</h5> -->
                      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
                      <small class="text-muted"><span class="ti-calendar mr-2"></span>27 Agustus 2018</small>
                  </div>
              </li>
              <li class="media">
                  <!-- <div class="circle-icon mr-4">1</div> -->
                  <img class="mr-3" src="images/berita/pelabuhan-letung-553x393.jpg" alt="" style="height: 120px;width:175px;">
                  <div class="media-body">
                      <!-- <h5>Create an Account</h5> -->
                      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
                      <small class="text-muted"><span class="ti-calendar mr-2"></span>27 Agustus 2018</small>
                  </div>
              </li>
              
              <!-- <li class="media">
                  <div class="circle-icon mr-4">3</div>
                  <div class="media-body">
                      <h5>Enjoy your life</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium obcaecati vel exercitationem </p>
                  </div>
              </li> -->
          </ul>
          <button type="button" class="btn btn-outline-secondary btn-sm float-right">lihat daftar</button>
      </div>
      <div class="col-md-4 mb-3">
          <span class="d-block p-2 bg-primary text-white">INFO KEGIATAN</span>
          <ul class="list-unstyled ui-steps">
              <li class="media">
                  <!-- <div class="circle-icon mr-4">1</div> -->
                  <img class="mr-3" src="images/berita/Tarempak tower lam.jpg" alt="" style="height: 120px;width:175px;">
                  <div class="media-body">
                      <!-- <h5>Create an Account</h5> -->
                      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
                      <small class="text-muted"><span class="ti-calendar mr-2"></span>27 Agustus 2018</small>
                  </div>
              </li>
              <li class="media">
                  <!-- <div class="circle-icon mr-4">1</div> -->
                  <img class="mr-3" src="images/berita/pelabuhan-letung-553x393.jpg" alt="" style="height: 120px;width:175px;">
                  <div class="media-body">
                      <!-- <h5>Create an Account</h5> -->
                      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
                      <small class="text-muted"><span class="ti-calendar mr-2"></span>27 Agustus 2018</small>
                  </div>
              </li>
              <li class="media">
                  <!-- <div class="circle-icon mr-4">1</div> -->
                  <img class="" src="images/berita/img_article.jpg" alt="" style="height: 120px;width:175px;margin-right: 10px;">
                  <div class="media-body">
                      <!-- <h5>Create an Account</h5> -->
                      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
                      <small class="text-muted"><span class="ti-calendar mr-2"></span>27 Agustus 2018</small>
                  </div>
              </li>
              <li class="media">
                  <!-- <div class="circle-icon mr-4">1</div> -->
                  <img class="mr-3" src="images/berita/pelabuhan-letung-553x393.jpg" alt="" style="height: 120px;width:175px;">
                  <div class="media-body">
                      <!-- <h5>Create an Account</h5> -->
                      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
                      <small class="text-muted"><span class="ti-calendar mr-2"></span>27 Agustus 2018</small>
                  </div>
              </li>
              <!-- <li class="media">
                  <div class="circle-icon mr-4">3</div>
                  <div class="media-body">
                      <h5>Enjoy your life</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium obcaecati vel exercitationem </p>
                  </div>
              </li> -->
          </ul>
          <button type="button" class="btn btn-outline-secondary btn-sm float-right">lihat daftar</button>
          <!-- <ul class="list-unstyled ui-steps">
              <li class="media">
                  <div class="circle-icon mr-4">1</div>
                  <div class="media-body">
                      <h5>Enjoy your life</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium obcaecati vel exercitationem </p>
                  </div>
              </li>
              <li class="media">
                  <div class="circle-icon mr-4">2</div>
                  <div class="media-body">
                      <h5>Enjoy your life</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium obcaecati vel exercitationem </p>
                  </div>
              </li>
              <li class="media">
                  <div class="circle-icon mr-4">3</div>
                  <div class="media-body">
                      <h5>Enjoy your life</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium obcaecati vel exercitationem </p>
                  </div>
              </li>
          </ul> -->
          <!-- <img src="images/iphonex.png" alt="iphone" class="img-fluid"> -->
      </div>
      <div class="col-md-3 mb-3">
          <span class="d-block p-2 bg-warning">KOMINFO</span>
          <div id="gpr-kominfo-widget-container" class="mt-3"></div>
      </div>
    </div>
  </div>
</div> --}}
@endsection

@push('scripts')
<script>
    var ctx = document.getElementById("chartPenduduk");
    if(ctx){
        ctx.height = 150;
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Laki-laki", "Perempuan"],
                datasets: [{
                    data: [5911, 5898],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    }
    var ctx = document.getElementById("chartKeluarga");
    if(ctx){
        ctx.height = 150;
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Laki-laki", "Perempuan"],
                datasets: [{
                    data: [3717, 337],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    }
</script>
@endpush