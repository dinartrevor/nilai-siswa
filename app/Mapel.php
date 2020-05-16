<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
  protected $table = 'mapel';
  protected $fillable = ['kode_mapel','nama_mapel'];
  public function guru(){
      return $this->hasMany(Guru::class);
  }
    public function nilai(){
      return $this->hasMany(nilai::class);
  }
}
