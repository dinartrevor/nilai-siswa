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

            <a href="{{route('cetakNilai')}}" target="_blank" class="btn  btn-neutral">Cetak</a>
          </div>
        </div>
      </div>
    </div>
  </div>
   <div class="col-md-12 mb-5">
    @if($message=Session::get('sukses'))
      <div class="alert alert-success alert-block">
        <button type="button"class="close" data-dismiss="alert">X</button>
        <strong>{{$message}}</strong>
      </div>
    @endif

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
                <th >Guru Mapel</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no= 1
              @endphp
              @foreach($nilai as $m)
                @php
                    $remedial_nilai=$m->remedial;
                    
                    $remedial_nilai = !empty($remedial_nilai) && isset($remedial_nilai[0]) ? $remedial_nilai[0] : null;
                @endphp
                <tr>
                  <td>
                    {{$no++}}
                  </td>
                  <td >{{$m->siswa->nis}}</td>
                  <td >{{$m->mapel->nama_mapel}}</td>
                  <td >{{$m->nilai_mapel}}</td>
                  @if ($m->status == 'Remed')
                    <td><span  class="badge  badge-danger">Remed</span></td>
                  @elseif ($m->status == 'Lulus')
                    <td ><span class="badge badge-success">Lulus</span></td>
                  @endif
                  <td >{{$m->semester}}</td>
                  <td >{{$m->guru ? $m->guru->nama : "tidak afa guru"}}</td>
                    @if ($m->status == 'Remed')
                    {{-- {{dd($m->remedial)}} --}}

                    @if (@$remedial_nilai->status == 'proses')
                     <td><button type="button" class="btn  btn-info" disabled>Proses</button></td>
                    @else
                    <td><a href="{{route('remedial', $m->id)}}" class="btn  btn-warning">Bereskan Remedial</a></td>
                    @endif
                    @elseif ($m->status == 'Lulus')
                    <td ><span class="btn btn-success">Tidak ada Remedial</span></td>
                  @endif
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
     
      </div>
       <span class="alert alert-success">Nilai Rata rata : {{$nilai_rata->rata_rata_nilai}}</span>
  </div>


@endsection