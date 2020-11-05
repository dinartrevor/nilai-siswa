<!DOCTYPE html>
<html>
<head>
  <title>Data Jurusan</title>
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
      
        <th >Nomer</th>
        <th >Jurusan</th>
      </tr>
    </thead>
    <tbody>
    
      @foreach($kelas as $m)
        <tr>
          <td> {{$loop->iteration}}</td>
          <td> {{$m->nama_jurusan}}</td>
        
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>