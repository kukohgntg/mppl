<?php

namespace App\Http\Controllers;

use App\Pemasukan;
use Illuminate\Http\Request;
use App\Imports\Pengeluaran;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\PDF;

class PengluaranController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pemasukan::where('kondisi', 'keluar')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="btn edit btn-primary btn-sm editData"><i class="icon-pencil"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData"><i class="icon-trash"></i></a>';
                    return $btn;
                })
                ->addColumn('many', function ($row) {
                    $hasil_rupiah = "Rp-" . number_format($row->jumlah, 0, ".", ".");
                    $btn = '<td>' . $hasil_rupiah . '</td>';
                    return $btn;
                })
                ->rawColumns(['action', 'many'])
                ->make(true);
        }

        return view('admin.pengeluaran.index');
    }

    public function import_excel(Request $request)
    {
        // validasi
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('files', $nama_file);
        Excel::import(new Pengeluaran, public_path('/files/' . $nama_file));
        Session::flash('sukses', 'Data Berhasil Diimport!');
        return redirect()->route('pengeluaran.index');
    }

    public function store(Request $request)
    {
        Pemasukan::updateOrCreate(
            ['id' => $request->data_id],
            [
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan,
                'sumber' => $request->pk,
                'user_id' => $request->user,
                'tanggal' => $request->tanggal,
                'kondisi' => 'keluar'
            ]
        );

        return response()->json([
            'status' => 'sukses',
            'pesan' => 'Data berhasil disimpan'
        ]);
    }

    public function edit($id)
    {
        $pengluaran = Pemasukan::find($id);
        return response()->json($pengluaran);
    }

    public function destroy($id)
    {
        Pemasukan::find($id)->delete();

        return response()->json([
            'status' => 'sukses',
            'pesan' => 'Data berhasil dihapus'
        ]);
    }

    public function cetak_pdf(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        $dana = Pemasukan::whereBetween('tanggal', [$start, $end])->where('kondisi', 'keluar')->get();

        $pdf = PDF::loadView('admin.pengeluaran.pengeluaran_pdf', compact('dana', 'end', 'start'));
        return $pdf->stream();
    }
}
