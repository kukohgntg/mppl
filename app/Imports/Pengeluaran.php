<?php

namespace App\Imports;

use App\Pemasukan;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;

class Pengeluaran implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pemasukan([
            'jumlah' => $row[1],
            'keterangan' => $row[2], 
            'sumber' => $row[3], 
            'tanggal' => $row[4],
            'user_id' =>  Auth::user()->name,
            'kondisi' => 'keluar'
        ]);
    }
}
