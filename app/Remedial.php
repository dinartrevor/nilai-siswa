<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remedial extends Model
{
    protected $table = 'remedial';

    protected $fillable = ['siswa_id', 'nilai_id', 'thumbnail', 'pesan', 'status'];
    
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function nilai()
    {
        return $this->belongsTo(Nilai::class);
    }

}
