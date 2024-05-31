<?php

namespace App\Http\Controllers;

use App\Webs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SejarahController extends Controller
{
    public function index(Request $request)
    {
        $dat = Webs::orderBy('id', 'DESC')->get();
        return view('admin/web/sejarah', compact('dat'));
    }

    public function store(Request $request)
    {
        Webs::updateOrCreate(
            ['id' => $request->data_id],
            ['sejarah' => $request->sejarah]
        );

        Session::flash('sukses', 'Data Berhasil Ditambahkan');
        return redirect('/sejarahs')->with('status', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $user = Webs::find($id);
        return response()->json($user);
    }
}
