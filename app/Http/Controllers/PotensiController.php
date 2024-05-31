<?php

namespace App\Http\Controllers;

use App\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Perubahan disini
use Illuminate\Support\Facades\Session; // Perubahan disini

class PotensiController extends Controller
{
    public function index(Request $request)
    {
        $dat = Potensi::orderBy('id', 'DESC')->get();
        return view('admin.potensi.index', compact('dat'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Jika diperlukan validasi foto
        ]);

        $namaFoto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . "_" . $foto->getClientOriginalName();
            $lokasi = public_path('/foto');
            $foto->move($lokasi, $namaFoto);
        }

        Potensi::updateOrCreate(
            ['id' => $request->data_id],
            [
                'nama_potensi' => $request->nama,
                'alamat' => $request->alamat,
                'keterangan' => $request->keterangan,
                'foto' => $namaFoto
            ]
        );

        Session::flash('sukses', 'Data Berhasil Disimpan');
        return redirect('/potensi')->with('status', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $potensi = Potensi::find($id);
        return response()->json($potensi);
    }

    public function destroy($id)
    {
        $potensi = Potensi::find($id);

        if ($potensi->foto) {
            File::delete(public_path('foto/' . $potensi->foto));
        }

        $potensi->delete();

        Session::flash('sukses', 'Data Berhasil Dihapus');
        return redirect('/potensi')->with('status', 'Data berhasil dihapus');
    }

    public function detail($id)
    {
        $potensi = Potensi::find($id);
        return view('ui.potensi.detail', compact('potensi'));
    }
}
