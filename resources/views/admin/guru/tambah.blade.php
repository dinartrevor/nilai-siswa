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
                <li class="breadcrumb-item"><a href="#">Guru</a></li>
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
              <h3 class="mb-0">Tambah Guru</h3>
            </div>
            <div class="col-4 text-right">
              <a href="/admin/murid" class="btn btn-sm btn-primary">Kembali</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form method="post" action="{{route('addGuru')}}">
            {{ csrf_field() }}
            <div class="pl-lg-4">
              @include('pemberitahuan.validasi') 
              <div class="row">
                 <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Kode</label>
                    <input type="text" id="input-username" class="form-control" placeholder="Masukan Kode..." name="kode" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Nip</label>
                    <input type="text" id="input-username" class="form-control" placeholder="Masukan Nip..." name="nip" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Nama</label>
                    <input type="text" id="input-username" class="form-control" placeholder="Masukan Nama..." name="nama" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Tempat Lahir</label>
                    <input type="text" id="input-username" class="form-control" placeholder="Masukan Tempat Lahir..." name="tempat_lahir" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Tanggal Lahir</label>
                    <input type="date" id="input-username" class="form-control" name="tanggal_lahir" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Agama</label>
                    <select class="form-control" name="agama" required>
                      <option>Pilih Agama</option>
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                      <option value="Kong Hu Cu">Kong Hu Cu</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" required>
                      <option>Jenis Kelamin</option>
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Wanita">Wanita</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Jabatan</label>
                       <input type="text" id="input-username" class="form-control" placeholder="Masukan Jabatan..." name="jabatan" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">No Hp</label>
                       <input type="text" id="input-username" class="form-control" placeholder="Masukan No Hp..." name="nomer_hp" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Mata Pelajaran</label>
                    <select class="form-control" name="mapel_id" required>
                      <option>Pilih Mapel</option>
                      @foreach($mapel as $m)
                        <option value="{{$m->id}}">{{$m->nama_mapel}}</option>
                      @endforeach
                      <option value="" disabled="disabled">─────────────────────────</option>
                      <option value="0">Bukan Guru Pengajar</option>
                    </select>
                  </div>
                </div>
                 <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Alamat</label>
                   <textarea rows="4" class="form-control" name="alamat" placeholder="Masukan alamat Anda..." required></textarea>
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