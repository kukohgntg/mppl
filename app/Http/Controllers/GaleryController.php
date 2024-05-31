<?php

namespace App\Http\Controllers;

use App\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class GaleryController extends Controller
{
    public function index(Request $request)
    {
        $dat = Galery::orderBy('id', 'DESC')->get();
        return view('admin.galery.index', compact('dat'));
    }

    public function store(Request $request)
    {
        $data = [
            'keterangan' => $request->keterangan
        ];

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama = time() . "_" . $foto->getClientOriginalName();
            $lokasi = public_path('/foto');
            $foto->move($lokasi, $nama);
            $data['foto'] = $nama;
        }

        Galery::updateOrCreate(
            ['id' => $request->data_id],
            $data
        );

        session()->flash('sukses', 'Data Berhasil Ditambahkan');
        return redirect()->route('galery.index');
    }

    public function edit($id)
    {
        $user = Galery::find($id);
        return response()->json($user);
    }

    public function destroy($id)
    {
        $gambar = Galery::where('id', $id)->first();
        File::delete('foto/' . $gambar->foto);
        Galery::find($id)->delete();

        return response()->json([
            'status' => 'sukses',
            'pesan' => 'Data berhasil dihapus'
        ]);
    }
}
