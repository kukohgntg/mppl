<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';
    // protected $guarded = [];
    protected $fillable = [
        'nama_lengkap', 'nik', 'jenis_klamin', 'tampat_lahir', 'tanggal_lahir', 'agama', 'pendidikan', 'pekerjaan', 'no_kk'
    ];
}
