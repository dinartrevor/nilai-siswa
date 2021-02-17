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
                <li class="breadcrumb-item"><a href="#">Mata Pelajaran</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="javascript:void(0)" class="btn btn-neutral" data-toggle="modal" data-target="#guru">Guru</a>
            <a href="{{route('tambah_mapel')}}" class="btn  btn-neutral">Tambah</a>
            <a href="{{route('report_mapel')}}" class="btn  btn-neutral" target="_blank">Cetak</a>
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
          <h3 class="mb-0">Mata Pelajaran</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table" id="dataTables">
            <thead class="thead-light">
              <tr>
                <th >No</th>
                <th >Kode Mapel</th>
                <th >Mata Pelajaran</th>
                <th >Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no= 1
              @endphp
              @foreach($mapel as $m)
                <tr>
                  <td>
                    {{$loop->iteration}}
                  </td>
                  <td>
                    {{$m->kode_mapel}}
                  </td>
                  <td>
                    {{$m->nama_mapel}}
                  </td>
                  <td>
                    <a href="{{url('/admin/mapel/edit-mapel/'.$m->id)}}" class="btn  btn-success">Edit</a>
                    <a href="{{url('/admin/mapel/delete-mapel/'.$m->id)}}" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="guru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Guru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="get" action="{{route('guru')}}">
            <div class="form-group">
              <label class="form-control-label" for="input-username">Guru</label>
               <select class="form-control select2" name="guru" required>
                <option value="">Pilih Guru</option>
                @foreach($guru as $s)
                  <option value="{{$s->mapel_id}}">{{$s->nama}}</option>
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