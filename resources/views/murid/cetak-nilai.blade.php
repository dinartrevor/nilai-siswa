<!DOCTYPE html>
<html>
<head>
  <title>Nilai Rapot Siswa</title>
</head>
<body>
  <div style="text-align: Center">
    <img src="{{ public_path('assets/img/icons/logo-dark.png')}}" style="width: 90px; float: left; ;">
    <h2>
      SMK 14 BANDUNG
      <br><span style="font-size: 15px;">Jl. Cijawura Hilir No. 341 | Bandung</span>
      <br><span style="font-size: 15px;">Telp: (022) 7560358 | Website: www.smkn14bdg.sch.id | Yahoo: smk14bdg@yahoo.com
      </span>
    </h2>
  </div>
  <hr>
   <table cellspacing="25">
      <tr>
         <th>Nama Peserta :</th>
         <td>{{auth()->user()->siswa->nama}}</td>
         <th>Nis :</th>
         <td>{{auth()->user()->siswa->nis}}</td>
      </tr>
      <tr>
        <th>Kelas/Jurusan :</th>
         <td>{{auth()->user()->siswa->kelas->nama_kelas}} / {{auth()->user()->siswa->kelas->nama_jurusan}}</td>
        <th>Tahun Ajaran :</th>
        <td>{{auth()->user()->siswa->kelas->tahun_ajaran}}</td>
      </tr>
      <tr>
        <th>Email :</th>
         <td>{{auth()->user()->siswa->email}}</td>
        <th>Agama :</th>
        <td>{{auth()->user()->siswa->agama}}</td>
      </tr>
      <tr>
        <th>Jenis Kelamin :</th>
        <td>{{auth()->user()->siswa->jenis_kelamin}}</td>
        <th>Alamat :</th>
        <td>{{auth()->user()->siswa->alamat}}</td>
      </tr>
  </table>
  <table border="1" style="text-align: center;" >
    <thead>
      <tr>
        <th width="20px">No</th>
        <th width="120px">Mata Pelajaran</th>
        <th width="120px">KKM</th>
        <th width="120px">Nilai</th>
        <th width="120px">Status</th>
        <th width="120px">Semester</th>
      </tr>
    </thead>
    <tbody>
      @php
        $no = 1;
      @endphp
      @foreach($nilai as $m)
        <tr>
          <td>{{$no++}}</td>
          <td >{{$m->mapel->nama_mapel}}</td>
          <td >{{$m->kkm}}</td>
          <td >{{$m->nilai_mapel}}</td>
          @if ($m->status == 'Remed')
            <td><span style="color: red;">Remed</span></td>
          @elseif ($m->status == 'Lulus')
            <td ><span style="color: green;">Lulus</span></td>
          @endif
          <td >{{$m->semester}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
    <table border="1" style="text-align: center; margin-top: 25px;" >
    <thead>
      <tr>
        <th width="100px">Remed</th>
        <th width="100px">Lulus</th>
      </tr>
    </thead>
    <tbody>

        <tr>
          <td ><span style="color: red;">{{$remed}}</span></td>
          <td ><span style="color: green;">{{$lulus}}</span></td>
        </tr>

    </tbody>
  </table>
</body>
</html>