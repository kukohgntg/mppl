<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Brita;
use App\Penduduk;


use Illuminate\Http\Request;

class PageController extends Controller
{
   public function akun()
   {
      return view('admin/user/pengaturan');
   }
   public function berita()
   {

      $brita = \App\Brita::orderBy('id', 'DESC')->paginate('5');

      return view('ui/berita/index', compact('brita'));
   }
   public function galery()
   {
      return view('ui/galery/index');
   }
   public function potensi()
   {
      return view('ui/potensi/index');
   }
   public function struktur()
   {
      return view('ui/struktur/index');
   }
   public function sejarah()
   {
      return view('ui/sejarah/index');
   }
   public function visi()
   {
      return view('ui/sejarah/visi');
   }
   public function peta()
   {
      return view('ui/coba');
   }
   public function agama()
   {
      $jumlah = [];
      $datum = [];

      $tes = DB::table('grafik')
         ->select('*')
         ->where('opsi', 'agama')
         ->get();



      foreach ($tes as $si) {
         $jumlah[] = $si->nomor;
         $datum[] = $si->lebel;
      }

      return view('ui/grafik/agama', compact('jumlah', 'datum', 'tes'));
   }
   public function pekerjaan()
   {
      $jumlah = [];
      $datum = [];

      $tes = DB::table('grafik')
         ->select('*')
         ->where('opsi', 'mata pencarian')
         ->get();



      foreach ($tes as $si) {
         $jumlah[] = $si->nomor;
         $datum[] = $si->lebel;
      }

      return view('ui/grafik/pekerjaan', compact('jumlah', 'datum', 'tes'));
   }
   public function pendidikan()
   {
      $jumlah = [];
      $datum = [];

      $tes = DB::table('grafik')
         ->select('*')
         ->where('opsi', 'pendidikan')
         ->get();



      foreach ($tes as $si) {
         $jumlah[] = $si->nomor;
         $datum[] = $si->lebel;
      }

      return view('ui/grafik/pendidikan', compact('jumlah', 'datum', 'tes'));
   }
   public function jenisklamin()
   {
      $jumlah = [];
      $datum = [];

      $tes = DB::table('grafik')
         ->select('*')
         ->where('opsi', 'penduduk')
         ->get();


      foreach ($tes as $si) {
         $jumlah[] = $si->nomor;
         $datum[] = $si->lebel;
      }

      return view('ui/grafik/jenisklamin', compact('jumlah', 'datum', 'tes'));
   }
}
