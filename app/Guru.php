<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
  protected $table = 'guru';
  protected $fillable =
  [
    'kode','nip','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','alamat','jabatan',
    'mapel_id','nomer_hp'
  ];
   public function mapel(){
    return $this->belongsTo(Mapel::class);
  }
}
