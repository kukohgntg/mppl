<?php

namespace App\Http\Controllers;

use App\Brita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BritaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Brita::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn edit  editData"><i class="icon-pencil"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn deleteData"><i class="icon-trash"></i></a>';
                    $btn .= ' <a href="dkomentar/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Komentar" class="btn komentar"><i class="icon-menu"></i></a>';
                    return $btn;
                })
                ->addColumn('foto', function ($row) {
                    $foto = '<img src="foto/' . $row->foto . '" alt="" width="50" height="50"> ';
                    return $foto;
                })
                ->rawColumns(['action', 'foto'])
                ->make(true);
        }

        return view('admin.berita.index');
    }

    public function store(Request $request)
    {
        $nama = 'nomedia.png';
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama = time() . "_" . $foto->getClientOriginalName();
            $lokasi = public_path('/foto');
            $foto->move($lokasi, $nama);
        }

        Brita::updateOrCreate(
            ['id' => $request->data_id],
            [
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'penulis' => $request->penulis,
                'foto' => $nama
            ]
        );

        session()->flash('sukses', 'Data Berhasil Ditambahkan');
        return redirect()->route('admin.berita.index')->with('status', 'data berhasil disimpan');
    }

    public function edit($id)
    {
        $user = Brita::find($id);
        return response()->json($user);
    }

    public function destroy($id)
    {
        $gambar = Brita::where('id', $id)->first();
        File::delete('foto/' . $gambar->foto);
        Brita::find($id)->delete();
        DB::table('komentar_brita')->where('brita_id', $id)->delete();

        return response()->json([
            'status' => 'sukses',
            'pesan' => 'Data berhasil dihapus'
        ]);
    }

    public function detail($id)
    {
        $brita = Brita::find($id);
        $brita->increment('views');
        return view('ui.berita.detail', compact('brita'));
    }

    public function komentar(Request $request)
    {
        DB::table('komentar_brita')->insert([
            'komentar' => $request->comment,
            'email' => $request->email,
            'name' => $request->name,
            'brita_id' => $request->id,
            'waktu' => now()->format('g:ia \o\n l jS F Y')
        ]);

        $brita = Brita::find($request->id);
        return view('ui.berita.detail', compact('brita'));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $pegawai = DB::table('table_brita')
            ->where('judul', 'like', "%" . $cari . "%")
            ->paginate();

        return view('ui.berita.index', ['brita' => $pegawai]);
    }

    public function comen($id)
    {
        $comen = DB::table('komentar_brita')->where('brita_id', $id)->get();
        return view('admin.berita.comen', compact('comen'));
    }

    public function hcomen($id)
    {
        DB::table('komentar_brita')->where('id', $id)->delete();
        return redirect()->route('admin.berita.index');
    }
}
