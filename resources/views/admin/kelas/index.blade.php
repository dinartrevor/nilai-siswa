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
          <div class="col-lg-6 col-5 text-right">
            <a href="{{route('tambah_kelas')}}" class="btn  btn-neutral" >Tambah</a>
            <a href="{{route('report_kelas')}}" class="btn  btn-neutral" target="_blank">Cetak</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      @if($message=Session::get('sukses'))
        <div class="alert alert-success alert-block">
          <button type="button"class="close" data-dismiss="alert">X</button>
          <strong>{{$message}}</strong>
        </div>
      @endif
      @if($message=Session::get('update'))
        <div class="alert alert-info alert-block">
          <button type="button"class="close" data-dismiss="alert">X</button>
          <strong>{{$message}}</strong>
        </div>
      @endif
      @if($message=Session::get('destroy'))
        <div class="alert alert-warning alert-block">
          <button type="button"class="close" data-dismiss="alert">X</button>
          <strong>{{$message}}</strong>
        </div>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
       <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Kelas</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table" id="dataTables">
            <thead class="thead-light">
              <tr>
                <th >No</th>
                <th >Kelas</th>
                <th >Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no= 1
              @endphp
              @foreach ($kelas as $k)
                <tr>
                  <td>
                    {{$no++}}
                  </td>
                  <td>
                    {{$k->nama_kelas}}
                  </td>
                  <td>
                    <a href="{{route('hapus-kelas', $k->id)}}" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
       <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Jurusan</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table" id="dataTabless">
            <thead class="thead-light">
              <tr>
                <th >No</th>
                <th >Jurusan</th>
                <th >Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no= 1
              @endphp
              @foreach ($jurusan as $k)
                <tr>
                  <td>
                    {{$no++}}
                  </td>
                  <td>
                    {{$k->nama_jurusan}}
                  </td>
                  <td>
                    <a href="{{route('hapus-jurusan', $k->id)}}" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection