<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table ='nilai';
    protected $fillable =
    [
      'siswa_id','mapel_id','kkm','nilai_mapel','status','semester','guru_id'
    ];

    public function siswa(){
      return $this->belongsTo(Siswa::class);
    }
    public function guru(){
      return $this->belongsTo(Guru::class);
    }
     public function mapel(){
      return $this->belongsTo(Mapel::class);
    }
    public function remedial()
    {
        return $this->hasMany(Remedial::class);
    }
}