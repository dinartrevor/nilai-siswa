<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
  protected $table = 'kelas';
  protected $fillable =
    [
      'nama_kelas','nama_jurusan','tahun_ajaran'
    ];

  public function siswa(){
    return $this->hasMany(Siswa::class);
  }
}
