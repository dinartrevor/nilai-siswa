<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
  protected $table = 'siswa';
  protected $fillable =
    [
      'nis','nama','email','images','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','alamat','asal_sekolah','kelas_id','user_id'
    ];
  public function kelas(){
    return $this->belongsTo(Kelas::class);
  }
  public function user()
  {
      return $this->belongsTo(User::class);
  }
  public function nilai()
  {
      return $this->hasMany(Nilai::class);
  }
  public function remedial()
  {
      return $this->hasMany(Remedial::class);
  }



}
