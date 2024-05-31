<?php

namespace App\Http\Controllers;

use App\Structurdesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use DataTables;

class StrukturdesaController extends Controller
{
    public function index(Request $request)
    {
        $dat = Structurdesa::orderBy('id', 'DESC')->get();
        return view('admin/structur/index', compact('dat'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama = time() . "_" . $foto->getClientOriginalName();
            $lokasi = public_path('/foto');
            $foto->move($lokasi, $nama);
        } else {
            $nama = null;
        }

        Structurdesa::updateOrCreate(
            ['id' => $request->data_id],
            [
                'nama' => $request->nama,
                'masa_jabatan' => $request->mulai . '---' . $request->selesai,
                'jabatan' => $request->role,
                'foto' => $nama
            ]
        );

        Session::flash('sukses', 'Data Berhasil Ditambahkan');
        return redirect('/structur')->with('status', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $user = Structurdesa::find($id);
        return response()->json($user);
    }

    public function destroy($id)
    {
        $gambar = Structurdesa::where('id', $id)->first();
        if ($gambar) {
            File::delete('foto/' . $gambar->foto);
        }

        Structurdesa::find($id)->delete();

        Session::flash('sukses', 'Data Berhasil Dihapus');
        return redirect('/structur')->with('status', 'Data berhasil dihapus');
    }
}
