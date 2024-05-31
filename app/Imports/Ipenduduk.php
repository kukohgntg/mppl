<?php

namespace App\Imports;

use App\Penduduk;
use Maatwebsite\Excel\Concerns\ToModel;

class Ipenduduk implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $tes = Penduduk::create([
            // 'id' => '',
            'nama_lengkap' => $row[1],
            'nik'          => $row[2], 
            'jenis_klamin' => $row[3], 
            'tampat_lahir' => $row[4],
            'tanggal_lahir' => $row[5],
            'agama'         => $row[6],
            'pendidikan'    => $row[7],
            'pekerjaan'     => $row[8],
            'no_kk'         =>' $row[9]'
        ]);
        return $tes;
     
    }
}
