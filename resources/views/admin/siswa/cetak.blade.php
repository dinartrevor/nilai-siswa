<!DOCTYPE html>
<html>
<head>
  <title>Data Siswa</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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


  <table style="text-align: center;" class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th >NIS</th>
        <th width="100px">Nama</th>
        <th >Tempat </th>
        <th width="110px"> Tanggal Lahir</th>
        <th >Kelas </th>
        <th >Jurusan </th>
        <th width="100px">Jenis Kelamin</th>
        <th >Tahun Ajaran</th>
        <th >Email</th>
      </tr>
    </thead>
    <tbody>
    
      @foreach($siswa as $m)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td >{{$m->nis}}</td>
          <td >{{$m->nama}}</td>
          <td >{{$m->tempat_lahir}}</td>
          <td>{{Carbon\Carbon::parse($m->tanggal_lahir)->format('d-M-Y')}}</td>
          <td >{{$m->nama_kelas}}</td>
          <td> {{$m->nama_jurusan}}</td>
       
          <td >{{$m->jenis_kelamin}}</td>
          <td >{{$m->tahun_ajaran}}</td>
          <td >{{$m->email}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <span>Jumlah Siswa {{$siswa->count()}}</span>
 
</body>
</html>