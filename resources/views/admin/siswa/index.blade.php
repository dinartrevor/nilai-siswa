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
                <li class="breadcrumb-item"><a href="#">Murid</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="javascript:void(0)" class="btn  btn-neutral" data-toggle="modal" data-target="#rangking">Rangking</a>
            <a href="{{route('tambah_murid')}}" class="btn  btn-neutral">Tambah</a>
            <a href="{{route('cetak_murid')}}" class="btn  btn-neutral" target="_blank">Cetak</a>
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
      @if($message=Session::get('delete'))
        <div class="alert alert-danger alert-block">
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
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Murid</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table" id="dataTables">
            <thead class="thead-light">
              <tr>
                <th >No</th>
                <th >Nis</th>
                <th >Nama</th>
                <th >Email</th>              
                <th >Jenis Kelamin</th>
                <th >Asal Sekolah</th>
                <th >Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no= 1
              @endphp
              @foreach($murid as $m)
                <tr>
                  <td>
                    {{$no++}}
                  </td>
                  <td >{{$m->nis}}</td>
                  <td ><a href="{{route('nilai_siswa', $m->id)}}" title="Nilai">{{$m->nama}}</a></td>
                  <td >{{$m->email}}</td>                 
                  <td >{{$m->jenis_kelamin}}</td>
                  <td >{{$m->asal_sekolah}}</td>
                  <td>
                    <a href="{{route('editMurid', $m->id)}}" class="btn  btn-success">Edit</a>
                    <a href="{{route('deleteMurid', $m->id)}}" class="btn btn-danger">Hapus</a>
                    <a href="{{route('detailMurid', $m->id)}}" class="btn btn-info">Detail</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="rangking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rangking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="get" action="{{route('rangking')}}">
          <div class="form-group">
            <label class="form-control-label" for="input-username">Kelas</label>
            <select class="form-control select2" name="kelas" id="mapel" required>
              <option value="">Pilih Kelas</option>
              @foreach($kelas as $s)
                <option value="{{$s->id}}">{{$s->nama_kelas}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-username">Jurusan</label>
            <select class="form-control select2" name="jurusan" required>
              <option value="">Pilih Jurusan</option>
               @foreach($jurusan as $j)
                <option value="{{$j->id}}">{{$j->nama_jurusan}}</option>
              @endforeach
            </select>
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