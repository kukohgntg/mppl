<?php

namespace App\Http\Controllers;

use App\Webs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class WebController extends Controller
{
    public function index(Request $request)
    {
        $dat = Webs::orderBy('id', 'DESC')->get();
        return view('admin/web/index', compact('dat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fb' => 'required',
            'ig' => 'required',
            'twiter' => 'required',
            'cp' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'tlp' => 'required',
            'nama' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation rules for image upload
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama  = time() . "_" . $foto->getClientOriginalName();
            $lokasi = public_path('/foto');
            $foto->move($lokasi, $nama);
        } else {
            $nama = null;
        }

        Webs::updateOrCreate(
            ['id' => $request->data_id],
            [
                'fb' => $request->fb,
                'ig' => $request->ig,
                'twiter' => $request->twiter,
                'cp' => $request->cp,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'tlp' => $request->tlp,
                'nama' => $request->nama,
                'logo' => $nama
            ]
        );

        Session::flash('sukses', 'Data Berhasil Ditambahkan');
        return redirect('/webseting')->with('status', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $user = Webs::find($id);
        return response()->json($user);
    }

    public function destroy($id)
    {
        $web = Webs::find($id);

        if ($web->logo) {
            File::delete(public_path('/foto/' . $web->logo));
        }

        $web->delete();

        return response()->json([
            'status' => 'sukses',
            'pesan' => 'Data berhasil dihapus'
        ]);
    }
}
