<?php

namespace App\Http\Controllers;

use App\Pemasukan;
use App\Dandes;
use App\Imports\Pemasukann;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class PemasukanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pemasukan::where('kondisi', 'pemasukan')->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editData"><i class="icon-pencil"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData"><i class="icon-trash"></i></a>';
                    return $btn;
                })
                ->addColumn('many', function ($row) {
                    $hasil_rupiah = "Rp " . number_format($row->jumlah, 0, ".", ".");
                    return '<td>' . $hasil_rupiah . '</td>';
                })
                ->rawColumns(['action', 'many'])
                ->make(true);
        }

        return view('admin.pemasukan.index');
    }

    public function store(Request $request)
    {
        $da = Dandes::select('jumlah')->first();
        $dana = $da->jumlah + $request->jumlah;

        Pemasukan::updateOrCreate(
            ['id' => $request->data_id],
            [
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan,
                'sumber' => $request->pk,
                'user_id' => $request->user,
                'tanggal' => $request->tanggal,
                'kondisi' => 'pemasukan'
            ]
        );

        return response()->json([
            'status' => 'sukses',
            'pesan' => 'Data berhasil disimpan'
        ]);
    }

    public function edit($id)
    {
        $pemasukan = Pemasukan::find($id);
        return response()->json($pemasukan);
    }

    public function destroy($id)
    {
        Pemasukan::find($id)->delete();

        return response()->json([
            'status' => 'sukses',
            'pesan' => 'Data berhasil dihapus'
        ]);
    }

    public function import_excel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('files', $nama_file);
        Excel::import(new Pemasukann, public_path('/files/' . $nama_file));

        Session::flash('sukses', 'Data Berhasil Diimport!');
        return redirect()->route('pemasukan.index');
    }

    public function cetak_pdf(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        $dana = Pemasukan::whereBetween('tanggal', [$start, $end])->where('kondisi', 'pemasukan')->get();

        $pdf = Pdf::loadView('admin.pemasukan.pemasukan_pdf', compact('dana', 'end', 'start'));
        return $pdf->stream();
    }
}
