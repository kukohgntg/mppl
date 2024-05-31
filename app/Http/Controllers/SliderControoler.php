<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use DataTables;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $dat = Slider::orderBy('id', 'DESC')->get();
        return view('admin/slider/index', compact('dat'));
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

        Slider::updateOrCreate(
            ['id' => $request->data_id],
            [
                'heding' => $request->h1,
                'heding2' => $request->h2,
                'color' => $request->color,
                'keterangan' => $request->keterangan,
                'foto' => $nama
            ]
        );

        Session::flash('sukses', 'Data Berhasil Ditambahkan');
        return redirect('/slider')->with('status', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $user = Slider::find($id);
        return response()->json($user);
    }

    public function destroy($id)
    {
        $gambar = Slider::where('id', $id)->first();
        if ($gambar) {
            File::delete('foto/' . $gambar->foto);
        }

        Slider::find($id)->delete();
        Session::flash('sukses', 'Data Berhasil Dihapus');
        return redirect('/slider')->with('status', 'Data berhasil dihapus');
    }
}
