@extends('murid._include.master')

@section('content')
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Histori Nilai</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="ni ni-books"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Histori Nilai</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="#" class="btn  btn-neutral">Cetak</a>
          </div>
        </div>
      </div>
    </div>
  </div>
   <div class="col-md-12">
          <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Nilai Siswa</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table" id="dataTables">
            <thead class="thead-light">
              <tr>
                <th >No</th>
                <th >Nis</th>
                <th >Mapel</th>
                <th >Nilai</th>
                <th >Status</th>
                <th >Semester</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no= 1
              @endphp
              @foreach($nilai as $m)
                <tr>
                  <td>
                    {{$no++}}
                  </td>
                  <td >{{$m->siswa->nis}}</td>
                  <td >{{$m->mapel->nama_mapel}}</td>
                  <td >{{$m->nilai_mapel}}</td>
                  @if ($m->status == 'Remed')
                    <td><span class="btn btn-sm btn-danger">Remed</span></td>
                  @elseif ($m->status == 'Lulus')
                    <td ><span class="btn btn-sm btn-success">Lulus</span></td>
                  @endif
                  <td >{{$m->semester}}</td>
                  <td>
                    <a href="" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
@endsection