@extends('admin._include.master')

@section('content')
 <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Guru</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="ni ni-books"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Detail Guru</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="/admin/guru" class="btn  btn-neutral">Kembali</a>
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
                      <span class="heading">Kode Guru</span>
                      <span class="description">{{$guru->kode}}</span>
                    </div>
                    <div>
                      <span class="heading">Jenis Kelamin</span>
                      <span class="description">{{$guru->jenis_kelamin}}</span>
                    </div>
                    <div>
                      <span class="heading">Agama</span>
                      <span class="description">{{$guru->agama}}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  {{$guru->nama}}<span class="font-weight-light">, {{$guru->nip}}</span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>{{$guru->alamat}}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>{{$guru->jabatan}} | {!! !empty($guru->mapel) ? $guru->mapel->nama_mapel: '<span class="btn btn-sm btn-danger"> Bukan Guru Pengajar</span>'!!}
                </div>
                <div class="h5">
                  <i class="ni business_briefcase-24 mr-2"></i>Nomer Hp {{$guru->nomer_hp}}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>{{$guru->tempat_lahir}} {{$guru->tanggal_lahir}}
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

@endsection