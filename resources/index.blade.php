@extends('admin._include.master')

@section('content')
  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Total Siswa</h5>
                    <span class="h2 font-weight-bold mb-0">{{$siswa->count()}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="fas fa-users"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Total Guru</h5>
                    <span class="h2 font-weight-bold mb-0">{{$guru->count()}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                      <i class="fas fa-user"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Total Jurusan</h5>
                    <span class="h2 font-weight-bold mb-0">{{$kelas->count()}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-hat-3"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Total Mapel</h5>
                    <span class="h2 font-weight-bold mb-0">{{$mapel->count()}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                      <i class="ni ni-books"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-profile">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                  <img src="/assets/img/icons/logo-dark.png" class="rounded-circle logo"  >
              </div>
            </div>
          </div>
          <div class="card-header text-center mt-5">
            <strong>Profil Sekolah</strong>
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center">
                  <div>
                    <span class="heading">NPSN</span>
                    <span class="description">20219160</span>
                  </div>
                  <div>
                    <span class="heading">Kode Pos</span>
                    <span class="description">40287</span>
                  </div>
                  <div>
                    <span class="heading">SK Pendirian</span>
                    <span class="description">1989-03-14</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <h5 class="h3">
                SMKN 14 BANDUNG
              </h5>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>Indonesia, Jawa Barat, Kota Bandung
              </div>
              <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>smkn14bdg@yahoo.com
              </div>
              <div>
                <i class="ni education_hat mr-2"></i>
                 <a href="https://www.smkn14bdg.sch.id/" class="text-muted" target="_blank">http://www.smkn14bdg.sch.id</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection