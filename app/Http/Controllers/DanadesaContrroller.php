<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemasukan;
use App\Penduduk;
use Illuminate\Support\Facades\DB;

class DanadesaContrroller extends Controller
{
    public function index()
    {
        // SELECT YEAR(tanggal_lahir) FROM penduduk
        // // $tes = Pemasukan::distinct('tanggal')->select('tanggal')->groupBy('tanggal')->get();
        // $tes = Pemasukan::select('tanggal')->groupBy('tanggal')->get();
        // $datos = Penduduk::distinct('agama')->count('agama');
        //         return $datos;
        // $siswa = Pemasukan::all();
        // $cartpemasukan = [];
        $cartss = [];

        // foreach($siswa as $si){
        //     $cartpemasukan[] = $si->tanggal;
        //     $cartss[] = $si->jumlah;
        // }



        // $cartss = DB::table('penduduk')
        //      ->select('agama', DB::raw('count(*) as total'))
        //      ->groupBy('agama')
        //      ->pluck('total')->all();
        //  return $cartss;
        //  echo $cartss[];
        // var_dump($cartss['agama']);  

        //  return view('admin/danadesa.index',compact('cartpemasukan','cartss'));




        $tes = DB::table('penduduk')
            ->select(DB::raw('count(*) as agamas'), 'agama')
            ->groupBy('agama')
            ->get();

        $tos = Penduduk::distinct()->get(['agama']);

        foreach ($tes as $si) {
            $cartss[] = $si->agamas;
        }

        return $cartss;
        die();
        // dd($cartss);
        return view('admin/danadesa.index', compact('cartss'));
    }
}
