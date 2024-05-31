<?php

namespace App\Http\Controllers;

use App\Quetes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class QuetesController extends Controller
{
    public function index(Request $request)
    {
        $dat = Quetes::orderBy('id', 'DESC')->get();
        return view('admin.quetes.index', compact('dat')); // Lokasi view diperbaiki
    }

    public function store(Request $request)
    {
        $nama = 'nomedia.png'; // Default value untuk nama foto

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama = time() . "_" . $foto->getClientOriginalName();
            $lokasi = public_path('/foto');
            $foto->move($lokasi, $nama);

            // Hapus foto lama jika ada
            if ($request->data_id !== null) {
                $poto = Quetes::where('id', $request->data_id)->first();
                File::delete('foto/' . $poto['foto']);
            }
        }

        Quetes::updateOrCreate(
            ['id' => $request->data_id],
            [
                'keterangan' => $request->keterangan,
                'penulis' => $request->penulis,
                'foto' => $nama
            ]
        );

        Session::flash('sukses', 'Data Berhasil Ditambahkan');
        return redirect('/quetes')->with('status', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $quetes = Quetes::find($id);
        return response()->json($quetes);
    }

    public function destroy($id)
    {
        // Hapus file gambar
        $gambar = Quetes::where('id', $id)->first();
        File::delete('foto/' . $gambar->foto);

        Quetes::find($id)->delete();

        Session::flash('sukses', 'Data Berhasil Dihapus');
        return redirect('/quetes')->with('status', 'Data berhasil dihapus');
    }
}
