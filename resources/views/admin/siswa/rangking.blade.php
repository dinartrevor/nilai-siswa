<!DOCTYPE html>
<html>
<head>
  <title>Data Siswa Rangking</title>
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


      <table class="table table-bordered text-center" id="dataTables">
        <thead class="thead-light ">
          <tr>
            <th >No</th>
            <th >Nis</th>
            <th >Nama</th>
            <th >Kelas</th>              
            <th >Jurusan</th>
            <th >Nilai Rata Rata</th>
            <th >Rangking</th>
          </tr>
        </thead>
        <tbody>
            @foreach($siswa as $m)
              <tr>
                <td>
                  {{$loop->iteration}}
                </td>
                <td >{{$m->nis}}</td>
                <td > {{$m->nama}}</td>
                <td >{{$m->nama_kelas}}</td>                 
                <td >{{$m->nama_jurusan}}</td>
                <td >{{$m->rata_rata_nilai}}</td>
                <td>Rangking {{$loop->iteration}}</td>
              
              </tr>
            @endforeach              
        </tbody>
      </table>
</body>
</html>