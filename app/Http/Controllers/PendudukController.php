<?php

namespace App\Http\Controllers;

use App\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use App\Imports\Ipenduduk;
use Maatwebsite\Excel\Facades\Excel;

class PendudukController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Penduduk::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editData"><i class="icon-pencil"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData"><i class="icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.penduduk.index');
    }

    public function store(Request $request)
    {
        Penduduk::updateOrCreate(
            ['id' => $request->data_id],
            [
                'nama_lengkap' => $request->name,
                'nik' => $request->nik,
                'jenis_klamin' => $request->jk,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'pendidikan' => $request->pendidikan,
                'pekerjaan' => $request->pekerjaan,
                'no_kk' => $request->no_kk
            ]
        );

        return response()->json([
            'status' => 'sukses',
            'pesan' => 'Data berhasil disimpan'
        ]);
    }

    public function edit($id)
    {
        $penduduk = Penduduk::find($id);
        return response()->json($penduduk);
    }

    public function destroy($id)
    {
        Penduduk::find($id)->delete();

        return response()->json([
            'status' => 'sukses',
            'pesan' => 'Data berhasil dihapus'
        ]);
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
        Excel::import(new Ipenduduk, public_path('/files/' . $nama_file));
        Session::flash('sukses', 'Data Berhasil Diimport!');
        return redirect()->route('penduduk.index');
    }
}
