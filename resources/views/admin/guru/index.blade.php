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
          <div class="col-lg-6 col-5 text-right">
            <a href="javascript:void(0)" class="btn btn-neutral" data-toggle="modal" data-target="#mapel">Mapel</a>
            <a href="{{route('tambah_guru')}}" class="btn  btn-neutral">Tambah</a>
            <a href="{{route('cetak_guru')}}" class="btn  btn-neutral" target="_blank">Cetak</a>
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
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Guru</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table" id="dataTables">
            <thead class="thead-light">
              <tr>
                <th >No</th>
                <th >Nip</th>
                <th >Nama</th>
                <th >Bidang</th>
                <th >Tempat & Tanggal Lahir</th>
                <th >Jenis Kelamin</th>
                <th >No Hp</th>
                <th >Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($guru as $g)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$g->nip}}</td>
                  <td>{{$g->nama}}</td>
                  <td>
                    {!!
                      !empty($g->mapel) ? $g->mapel->nama_mapel:
                      '<span class="btn btn-sm btn-danger"> Bukan Guru Pengajar</span>'
                    !!}
                  </td>
                  <td>{{$g->tempat_lahir}} - {{Carbon\Carbon::parse($g->tanggal_lahir)->format('d-m-Y')}}</td>
                  <td>{{$g->jenis_kelamin}}</td>
                  <td>{{$g->nomer_hp}}</td>
                  <td>
                    <a href="{{route('edit_guru', $g->id)}}" class="btn  btn-success">Edit</a>
                    <a href="{{route('delete_guru', $g->id)}}" class="btn btn-danger">Hapus</a>
                    <a href="{{route('detail_guru', $g->id)}}" class="btn btn-info">Detail</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
   <div class="modal fade" id="mapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Mapel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="get" action="{{route('mapel')}}">
            <div class="form-group">
              <label class="form-control-label" for="input-username">Mapel</label>
               <select class="form-control select2" name="mapel" required>
                <option value="">Pilih Mapel</option>
                @foreach($mapel as $s)
                  <option value="{{$s->id}}">{{$s->nama_mapel}}</option>
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