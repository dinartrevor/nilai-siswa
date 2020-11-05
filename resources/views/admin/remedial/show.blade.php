@extends('admin._include.master')

@section('content')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Remedial Siswa</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-book"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Remedial Siswa</a></li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
        <a href="{{url('admin/remedial')}}" class="btn btn-neutral">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card mb-3">
      <img src="{{asset('storage/media/remedial/'. $remedial->thumbnail)}}" class="card-img-top" alt="..." height="400px">
      <div class="card-body">
      <h5 class="card-title">{{$siswa->nama}} - {{$siswa->nis}} - {{$siswa->kelas->nama_kelas}} - {{$siswa->kelas->nama_jurusan}} - {{$siswa->kelas->tahun_ajaran}}</h5>
      <p class="card-text">{{$remedial->pesan}}</p>
      <p class="card-text">{{$nilai->mapel->nama_mapel}} - {{$nilai->guru->nama}}</p>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4>Nilai</h4>
      </div>
      <div class="card-body">
      <form action="{{route('remedial.update', $nilai->id)}}" method="POST">
          {{ csrf_field() }}
          <div class="row">
            <div class="col">
              <label for="">Semester</label>
              <input type="text" class="form-control" name="semester" value="{{$nilai->semester}}" readonly>
            </div>
            <div class="col">
              <label for="">Status</label>
              <input type="text" class="form-control" name="status" value="{{$nilai->status}}" readonly>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <label for="">KKM</label>
              <input type="text" class="form-control" name="kkm" value="{{$nilai->kkm}}" readonly>
            </div>
            <div class="col">
              <label for="">Nilai</label>
              <input type="text" class="form-control" name="nilai_mapel"value="{{$nilai->nilai_mapel}}">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <div class=" custom-switch">
                <input type="checkbox" class="custom-control-input" name="status_remed"   {{$remedial->status== 'selesai' ? 'checked':''}} value="selesai" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">Selesai</label>
              </div>
            </div>
            <div class="col">
              <div class=" form-group float-right">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
@endsection