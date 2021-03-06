@extends('admin._include.master')

@section('content')
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Mapel</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="ni ni-books"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Mapel</a></li>
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
              <h3 class="mb-0">Edit Mapel</h3>
            </div>
            <div class="col-4 text-right">
              <a href="/admin/mapel" class="btn btn-sm btn-primary">Kembali</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{route('updateMapel', $mapel)}}" method="POST">
            @csrf
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Kode</label>
                    <input type="text" id="input-username" class="form-control" value="{{$mapel->kode_mapel}}" name="kode">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Mapel</label>
                    <input type="text" id="input-username" class="form-control" value="{{$mapel->nama_mapel}}" name="nama_mapel">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Semester</label>
                    <select class="form-control" name="semester">
                      <option>Pilih Semester</option>
                      <option value="Ganjil" {{$mapel->semester == 'Ganjil'  ? 'selected' : ''}}>Ganjil</option>
                      <option value="Genap" {{$mapel->semester == 'Genap'  ? 'selected' : ''}}>Genap</option>
                    </select>
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