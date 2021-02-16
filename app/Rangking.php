<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rangking extends Model
{
    protected $table = 'rangking';
    protected $fillable = ['siswa_id', 'nilai_id', 'rangking1','rangking2','rangking3'];
}