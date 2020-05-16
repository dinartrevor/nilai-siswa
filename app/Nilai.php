<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table ='nilai';
    protected $fillable =
    [
      'siswa_id','mapel_id','kkm','nilai_mapel','status','semester'
    ];

    public function siswa(){
      return $this->belongsTo(Siswa::class);
    }
     public function mapel(){
      return $this->belongsTo(Mapel::class);
    }
}