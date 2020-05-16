@extends('admin._include.master')

@section('content')
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Kelas & Jurusan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="ni ni-books"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Kelas & Jurusan</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Tambah Kelas & Jurusan</h3>
            </div>
            <div class="col-4 text-right">
              <a href="/admin/kelas" class="btn btn-sm btn-primary">Kembali</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{route('addKelas')}}" method="POST">
            @csrf
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Kelas</label>
                    <input type="text" id="input-username" class="form-control" placeholder="Kelas" name="nama_kelas">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Tahun Ajaran</label>
                    <input type="text" id="input-username" class="form-control" placeholder="Jurusan" name="tahun_ajaran">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Jurusan</label>
                    <input type="text" id="input-username" class="form-control" placeholder="Jurusan" name="nama_jurusan">
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection