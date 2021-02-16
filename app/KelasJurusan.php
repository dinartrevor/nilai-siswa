<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasJurusan extends Model
{
    protected $table = 'kelas_jurusan';
    protected $fillable = ['kelas_id', 'jurusan_id', 'siswa_id'];
}