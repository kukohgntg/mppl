<?php

namespace App\Http\Controllers;

use App\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeuanganController extends Controller
{

      public function index()
      {

            $tahun = date('Y');

            // januari
            $ja = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '01')
                  ->where('kondisi', 'pemasukan')
                  ->sum('jumlah');

            // feb
            $fe = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '02')
                  ->where('kondisi', 'pemasukan')
                  ->sum('jumlah');


            // marert
            $ma = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '03')
                  ->where('kondisi', 'pemasukan')
                  ->sum('jumlah');



            // april
            $ap = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '04')
                  ->where('kondisi', 'pemasukan')
                  ->sum('jumlah');



            // mei
            $me = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '05')
                  ->where('kondisi', 'pemasukan')
                  ->sum('jumlah');



            // juni
            $jun = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '06')
                  ->where('kondisi', 'pemasukan')
                  ->sum('jumlah');



            // juli
            $jul = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '07')
                  ->where('kondisi', 'pemasukan')
                  ->sum('jumlah');



            // agustus
            $ag = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '08')
                  ->where('kondisi', 'pemasukan')
                  ->sum('jumlah');



            // september
            $sep = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '09')
                  ->where('kondisi', 'pemasukan')
                  ->sum('jumlah');



            // oktober
            $ok = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '10')
                  ->where('kondisi', 'pemasukan')
                  ->sum('jumlah');



            // november
            $no = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '01')
                  ->where('kondisi', 'pemasukan')
                  ->sum('jumlah');



            // desember
            $de = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '01')
                  ->where('kondisi', 'pemasukan')
                  ->sum('jumlah');



            $pemasukan = [
                  [$ja], [$fe], [$ma], [$ap], [$me], [$jun], [$jul], [$ag], [$sep], [$ok], [$no], [$de]
            ];
            // keluar

            // januari
            $jak = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '01')
                  ->where('kondisi', 'keluar')
                  ->sum('jumlah');

            // feb
            $fek = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '02')
                  ->where('kondisi', 'keluar')
                  ->sum('jumlah');


            // marert
            $mak = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '03')
                  ->where('kondisi', 'keluar')
                  ->sum('jumlah');


            // april
            $apk = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '04')
                  ->where('kondisi', 'keluar')
                  ->sum('jumlah');


            // mei
            $mek = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '05')
                  ->where('kondisi', 'keluar')
                  ->sum('jumlah');


            // juni
            $junk = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '06')
                  ->where('kondisi', 'keluar')
                  ->sum('jumlah');


            // juli
            $julk = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '07')
                  ->where('kondisi', 'keluar')
                  ->sum('jumlah');


            // agustus
            $agk = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '08')
                  ->where('kondisi', 'keluar')
                  ->sum('jumlah');

            // september
            $sepk = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '09')
                  ->where('kondisi', 'keluar')
                  ->sum('jumlah');

            // oktober
            $okk = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '10')
                  ->where('kondisi', 'keluar')
                  ->sum('jumlah');

            // november
            $nok = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '11')
                  ->where('kondisi', 'keluar')
                  ->sum('jumlah');

            // desember
            $dek = Pemasukan::select('jumlah')->whereYear('tanggal', '=', $tahun)
                  ->whereMonth('tanggal', '=', '12')
                  ->where('kondisi', 'keluar')
                  ->sum('jumlah');

            $keluar = [
                  [$jak], [$fek], [$mak], [$apk], [$mek], [$junk], [$julk], [$agk], [$sepk], [$okk], [$nok], [$dek]
            ];

            $qry = Pemasukan::sum('jumlah');
            $hasil_rupiah = "Rp-" . number_format($qry, 0, ".", ".");

            return view('admin/pengeluaran/keungan', compact('pemasukan', 'keluar', 'hasil_rupiah'));
      }
}
