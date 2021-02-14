@extends('murid._include.master')

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
          <div class="col-xl-6 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title  text-uppercase text-muted mb-0">Total Remed</h5>
                    <span class="h2 font-weight-bold mb-0">{{$nilai}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
                      <i class="ni ni-books"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title  text-uppercase text-muted mb-0">Total Lulus</h5>
                    <span class="h2 font-weight-bold mb-0 ">{{$lulus}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
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
            <span style="font-size: 20px; margin-bottom:30px; text-align:center;"><b>Data Nilai Semester Ganjil</b></span>
           <canvas id="myChart" style="width: 100%; height: 300px;max-height:300px;"></canvas>
        </div>
      </div>
      
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-profile">
            <span style="font-size: 20px; margin-bottom:30px; text-align:center;"><b>Data Nilai Semester Genap</b></span>
           <canvas id="areaChart" style="width: 100%; height: 300px;max-height:300px;"></canvas>
        </div>
      </div>
      
    </div>
   
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-profile">
          <div class="card-body pt-0">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center">
                  <div>
                    <span class="heading">NIS</span>
                    <span class="description">{{auth()->user()->siswa->nis}}</span>
                  </div>
                  <div>
                    <span class="heading">Jenis Kelamin</span>
                    <span class="description">{{auth()->user()->siswa->jenis_kelamin}}</span>
                  </div>
                  <div>
                    <span class="heading">Agama</span>
                    <span class="description">{{auth()->user()->siswa->agama}}</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <h5 class="h3">
                {{auth()->user()->siswa->nama}}
              </h5>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>{{auth()->user()->siswa->alamat}}
              </div>
              <div class="h3">
                <i class="ni business_briefcase-24 mr-2"></i>{{auth()->user()->siswa->email}}
              </div>
              <div >
                <i class="ni education_hat mr-2"></i>
                {{$murid_kelas_jurusan->nama_kelas}} {{$murid_kelas_jurusan->nama_jurusan}}
              </div>
              <div >
                <i class="ni education_hat mr-2"></i>
                {{auth()->user()->siswa->tahun_ajaran}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
@endsection