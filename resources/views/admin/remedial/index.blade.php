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
             <!--  <form>
                <input type="text" name="search" autocomplete="off" id="search" placeholder="Cari Siswa yang remedial">
                <button class="btn btn-neutral">Cari</button>
              </form> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  {{--  @if($message=Session::get('sukses'))
      <div class="alert alert-success alert-block">
      <button type="button"class="close" data-dismiss="alert">X</button>
      <strong>{{$message}}</strong>
      </div>
  @endif  --}}
  <div class="row">
    <div class="col-md-12">
    @foreach ($remedial as $item)
      @php
          $remedial_nilai=$item->remedial;
          
          $remedial_nilai = !empty($remedial_nilai) && isset($remedial_nilai[0]) ? $remedial_nilai[0] : null;
      @endphp
      @if(@$remedial_nilai->status == 'selesai')

      @else
      <div class="card">
        <div class="card-header">
          <h5>{{$item->siswa ? $item->siswa->nama : "Tidak Ada yang Remed"}}</h5>
          @if(@$remedial_nilai->status == 'proses')
          <span class="badge badge-success float-right">Remedial Sudah di kerjakan</span>
          @else
            <span class="badge badge-danger float-right">Remedial belum di kerjakan</span>
          @endif
        </div>

        <div class="card-body">
          <h5 class="card-title">Mata Pelajaran : {{$item->mapel ? $item->mapel->nama_mapel : "Tidak Ada Yang Remedial"}}</h5>
            <h5 class="card-title">Guru Mata Pelajaran : {{$item->guru ? $item->guru->nama: "Tidak Ada Yang Remedial"}}</h5>
              @if(@$remedial_nilai->status == 'proses')
              <a href="{{route('detail.remedial',$item->id)}}" class="btn btn-primary">Selengkapnya</a>


              @else
             <span class="badge badge-danger">Belum Di kerjakan</span> 
              @endif
          
        </div>
      </div>
      @endif
    @endforeach
    @include('pagination.default', ['paginator' => $remedial])
    
      
      </div>
    </div>
  </div>
  <style>
    #search{
      border: white;
      width: 60%;
      height: 50px;
      border-radius: 10px;
      padding: 10px;
    }
  </style>
@endsection