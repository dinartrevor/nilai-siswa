@extends('murid._include.master')

@section('content')
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Remedial</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="ni ni-books"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Remedial</a></li>
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
              <h3 class="mb-0">Remedial Murid</h3>
            </div>
            <div class="col-4 text-right">
              <a href="/murid/histori-nilai" class="btn btn-sm btn-primary">Kembali</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form method="post" action="{{route('bukti_remedial', $nilai)}}">
            {{ csrf_field() }}
            <div class="pl-lg-4">
              @include('pemberitahuan.validasi') 
              <div class="row">
                 <div class="col-lg-12">
                  <div class="form-group">
                    <label for="lfm">Bukti Remedial</label>
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary input-group-btn">
                          <i class="fa fa-picture-o"></i> Choose
                        </a>
                      </span>
                      <input id="thumbnail" class="form-control" type="text" name="thumbnail" {{$errors->has('thumbnail') ? 'has-error' : ''}} autocomplete="off">
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">
                    @if ($errors->has('thumbnail'))
                      <span class="help-block">{{$errors->first('thumbnail')}}</span>
                    @endif
                  </div>
                </div>
                 <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Pesan</label>
                   <textarea rows="4" class="form-control" name="pesan" placeholder="Masukan pesan Anda..." required></textarea>
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