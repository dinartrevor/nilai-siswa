<!DOCTYPE html>
<html>
<head>
  <title>Data Guru</title>
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
      
        <th >NIP</th>
        <th width="125px">Nama</th>
        <th width="200px">Tempat Tanggal Lahir</th>
        <th >Nomer Handphone</th>
        <th >Jenis Kelamin</th>
         <th >Agama</th>
        <th >Mapel</th>
      </tr>
    </thead>
    <tbody>
    
      @foreach($guru as $m)
        <tr>
         
          <td >{{$m->nip}}</td>
          <td >{{$m->nama}}</td>
          <td >{{$m->tempat_lahir}}, {{$m->tanggal_lahir}}</td>
         
          <td >{{$m->nomer_hp}}</td>
          <td >{{$m->jenis_kelamin}}</td>
           <td >{{$m->agama}}</td>
          <td >{{$m->mapel->nama_mapel}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>