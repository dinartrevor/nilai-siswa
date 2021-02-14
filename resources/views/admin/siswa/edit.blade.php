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
              <h3 class="mb-0">Edit Murid</h3>
            </div>
            <div class="col-4 text-right">
              <a href="/admin/murid" class="btn btn-sm btn-primary">Kembali</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form method="post" action="{{route('updateMurid', $murid)}}">
            {{ csrf_field() }}
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Nis</label>
                    <input type="text" id="input-username" class="form-control" value="{{$murid->nis}}" name="nis">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Nama</label>
                    <input type="text" id="input-username" class="form-control" value="{{$murid->nama}}" name="nama">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">E-mail</label>
                    <input type="text" id="input-username" class="form-control" value="{{$murid->email}}" name="email">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Tempat Lahir</label>
                    <input type="text" id="input-username" class="form-control" value="{{$murid->tempat_lahir}}" name="tempat_lahir">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Tanggal Lahir</label>
                    <input type="date" id="input-username" class="form-control" value="{{$murid->tanggal_lahir}}" name="tanggal_lahir">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Agama</label>
                    <select class="form-control" name="agama">
                      <option>Pilih Agama</option>
                      <option value="Islam" {{$murid->agama == 'Islam'  ? 'selected' : ''}}>Islam</option>
                      <option value="Kristen" {{$murid->agama == 'Kristen'  ? 'selected' : ''}}>Kristen</option>
                      <option value="Hindhu" {{$murid->agama == 'Hindhu'  ? 'selected' : ''}}>Hindhu</option>
                      <option value="Budha" {{$murid->agama == 'Budha'  ? 'selected' : ''}}>Budha</option>
                      <option value="Kong Hu Cu" {{$murid->agama == 'Kong Hu Cu'  ? 'selected' : ''}}>Kong Hu Cu</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                      <option>Jenis Kelamin</option>
                        <option value="Laki-Laki" {{$murid->jenis_kelamin == 'Laki-Laki'  ? 'selected' : ''}}>Laki-Laki</option>
                      <option value="Wanita" {{$murid->jenis_kelamin == 'Wanita'  ? 'selected' : ''}}>Wanita</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Kelas</label>
                    <select class="form-control" name="kelas_id">
                     @foreach($kelas as $key => $row)
                                <option value="{{ $row->id }}" @foreach($kelasJurusan as $a=>$value)
                                    {{$row->id==$value->kelas_id?'selected':''}}
                                    @endforeach >{{ $row->nama_kelas }}</option>
                                @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Jurusan</label>
                    <select class="form-control" name="jurusan">
                     @foreach($jurusan as $key => $row)
                                <option value="{{ $row->id }}" @foreach($kelasJurusan as $a=>$value)
                                    {{$row->id==$value->jurusan_id?'selected':''}}
                                    @endforeach >{{ $row->nama_jurusan }}</option>
                                @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Tahun Ajaran</label>
                   <input type="text" id="input-username" class="form-control" value="{{$murid->tahun_ajaran}}" name="tahun_ajaran">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Asal Sekolah</label>
                       <input type="text" id="input-username" class="form-control" value="{{$murid->asal_sekolah}}" name="asal_sekolah">
                  </div>
                </div>
                 <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Alamat</label>
                   <textarea rows="4" class="form-control" name="alamat">{{$murid->alamat}}</textarea>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection