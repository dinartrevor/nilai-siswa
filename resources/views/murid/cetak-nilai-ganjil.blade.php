<!DOCTYPE html>
<html>
<head>
  <title>Nilai Rapot Siswa</title>
</head>
<body>
  <div style="text-align: Center">
    <img src="{{ public_path('assets/img/icons/logo-dark.png')}}" style="width: 90px; float: left; ;">
    <h2>
      SMKN 14 BANDUNG
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
         <td>{{$murid_kelas_jurusan->nama_kelas}} / {{$murid_kelas_jurusan->nama_jurusan}}</td>
        <th>Tahun Ajaran :</th>
        <td>{{auth()->user()->siswa->tahun_ajaran}}</td>
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
      
        <th width="120px">Mata Pelajaran</th>
        <th width="75px">KKM</th>
        <th width="75px">Nilai</th>
        <th width="100px">Status</th>
        <th width="100px">Semester</th>
        <th  width="150px">Guru Mapel</th>
      </tr>
    </thead>
    <tbody>
    
      @foreach($nilai as $m)
        <tr>
         
          <td >{{$m->mapel->nama_mapel}}</td>
          <td >{{$m->kkm}}</td>
          <td >{{$m->nilai_mapel}}</td>
          @if ($m->status == 'Remed')
            <td><span style="color: red;">Remed</span></td>
          @elseif ($m->status == 'Lulus')
            <td ><span style="color: green;">Lulus</span></td>
          @endif
          <td >{{$m->semester}}</td>
          <td >{{$m->guru->nama}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
    <table border="1" style="text-align: center; margin-top: 25px;" >
    <thead>
      <tr>
        <th width="100px">Remed</th>
        <th width="100px">Lulus</th>
        <th width="100px">Rata Rata</th>
      </tr>
    </thead>
    <tbody>

        <tr>
          <td ><span style="color: red;">{{$remed}}</span></td>
          <td ><span style="color: green;">{{$lulus}}</span></td>
           <td ><span style="color: blue;">{{$nilai_rata->rata_rata_nilai}}</span></td>
        </tr>

    </tbody>
  </table>
</body>
</html>