@extends('admin._include.master')

@section('content')
 <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Murid</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="ni ni-books"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Detail Murid</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="/admin/murid" class="btn  btn-neutral">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
      <div class="row">
        <div class="col-xl-12 order-xl-2">
          <div class="card card-profile mt-4">
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading">E-mail</span>
                      <span class="description">{{$murid->email}}</span>
                    </div>
                    <div>
                      <span class="heading">Jenis Kelamin</span>
                      <span class="description">{{$murid->jenis_kelamin}}</span>
                    </div>
                    <div>
                      <span class="heading">Agama</span>
                      <span class="description">{{$murid->agama}}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  {{$murid->nama}}<span class="font-weight-light">, {{$murid->nis}}</span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>{{$murid->alamat}}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>{{$murid->kelas->nama_kelas}} {{$murid->kelas->nama_jurusan}}
                </div>
                <div class="h5">
                  <i class="ni business_briefcase-24 mr-2"></i>Tahun Ajaran: {{$murid->kelas->tahun_ajaran}}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>{{$murid->tempat_lahir}} {{$murid->tanggal_lahir}}
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>Asal Sekolah : {{$murid->asal_sekolah}}
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

@endsection