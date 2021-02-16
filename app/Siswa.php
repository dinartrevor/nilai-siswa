<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kelas;
class Siswa extends Model
{
  protected $table = 'siswa';
  protected $fillable =
    [
      'nis','nama','email','images','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','alamat','asal_sekolah','tahun_ajaran','user_id'
    ];
  public function kelas()
    {
    	return $this->belongsToMany(
        Kelas::class,
        'kelas_jurusan',
        'siswa_id',
        'kelas_id');
    }
    public function jurusan()
    {
    	return $this->belongsToMany(
        Jurusan::class,
        'kelas_jurusan',
        'siswa_id',
        'jurusan_id');
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