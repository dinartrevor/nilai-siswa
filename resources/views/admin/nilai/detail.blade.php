@extends('admin._include.master')

@section('content')
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Nilai</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="ni ni-books"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Nilai</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <button type="button" class="btn btn-neutral" data-toggle="modal" data-target="#exampleModal">Tambah</button>
            <a href="/admin/murid" class="btn btn-neutral">Kembali</a>
            <a href="{{route('cetak_nilai_murid', $murid->id)}}" class="btn btn-neutral">Laporan</a>
          </div>
        </div>
      </div>
    </div>
  </div>
    @if($message=Session::get('sukses'))
    <div class="alert alert-success alert-block">
      <button type="button"class="close" data-dismiss="alert">X</button>
      <strong>{{$message}}</strong>
    </div>
  @endif
  @if($message=Session::get('error'))
    <div class="alert alert-danger alert-block">
      <button type="button"class="close" data-dismiss="alert">X</button>
      <strong>{{$message}}</strong>
    </div>
  @endif
  @if($message=Session::get('delete'))
        <div class="alert alert-danger alert-block">
          <button type="button"class="close" data-dismiss="alert">X</button>
          <strong>{{$message}}</strong>
        </div>
      @endif
  <div class="row">

    <div class="col-md-4">
       <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h3 class="card-title">Data Diri Siswa</h3>
            <strong class="card-text">{{$murid->nama}}</strong>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">{{$murid->kelas->nama_kelas}} {{$murid->kelas->nama_jurusan}} </li>
            <li class="list-group-item">{{$murid->kelas->tahun_ajaran}}</li>
            <li class="list-group-item">{{$murid->jenis_kelamin}}</li>
          </ul>
        </div>
    </div>
    <div class="col-md-8">
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
                    <a href="{{url('admin/nilai/delete-nilai/'.$m->id.'/'.$murid->id)}}" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
      <span class="alert alert-success">Nilai Rata rata : {{$nilai_rata->rata_rata_nilai}}</span>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('nilai', $murid)}}">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="form-control-label" for="input-username">Mapel</label>
            <select class="form-control select2" name="mapel_id" id="mapel" required>
              <option>Pilih Mapel</option>
              @foreach($mapel as $s)
                <option value="{{$s->id}}">{{$s->nama_mapel}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-username">Guru Mapel</label>
            <select class="form-control select2" name="guru_id" id="guru" required>
              <option>Pilih Guru Mapel</option>
             
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-username">Semester</label>
            <select class="form-control select2" name="semester" required>
              <option>Pilih Semester</option>
              <option value="Ganjil">Ganjil</option>
              <option value="Genap">Genap</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-username">Nilai</label>
            <input type="number" id="input-username" required class="form-control" placeholder="Masukan Nilai" name="nilai_mapel">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Send message</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

@endsection