@extends('murid._include.master')

@section('content')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Profil</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="ni ni-books"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Profil</a></li>
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
            <h3 class="mb-0">Edit Profil</h3>
          </div>
        </div>
      </div>
      <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form method="post" action="{{route('editProfileSiswa', $siswa->id)}}" autocomplete="off" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-md-8">   
                <div class="form-group">
                  <label for="image-upload" id="form-control-label">Masukan Gambar Profile</label>
                  <input type="file" name="images" class="form-control"id="image-upload" accept="image/*" onchange="readURL(this);" />
                </div>
              </div>
              <div class="col-md-4">   
                @if(@$siswa->id)
                <img id="img-upload-display"
                  src="{{$siswa && $siswa->images ? '/storage/media/profile/'. $siswa->images : '/assets/img/brand/favicon.png'}}"
                  alt="your image" width="100px" />
                @else
                <img src="{{ asset('assets/img/brand/favicon.png') }}" width="100px" class="mr-1" id="img-upload-display">
                @endif
                
                
              </div>
             
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Nama</label>
                  <input type="text" id="input-username" class="form-control" value="{{$siswa->nama}}" name="nama">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Asal Sekolah</label>
                     <input type="text" id="input-username" class="form-control" value="{{$siswa->asal_sekolah}}" name="asal_sekolah">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Alamat</label>
                 <textarea rows="4" class="form-control" name="alamat">{{$siswa->alamat}}</textarea>
                </div>
              </div>
              <div class="col-lg-12">
              <div class="mt-4 mb-4">
                <h4>Ganti Password</h4>
                <hr>
              </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Password Saat Ini</label>
                     <input type="password" id="input-username" class="form-control"  name="password_lama">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Password Baru</label>
                     <input type="password" id="input-username" class="form-control"  name="new_password">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Konfirmasi Password</label>
                     <input type="password" id="input-username" class="form-control"  name="confirm_password">
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