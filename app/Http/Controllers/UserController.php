<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn edit editData"><i class="icon-pencil"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn deleteData"><i class="icon-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/user/index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
        ]);

        $username = 'U' . str_pad(User::count() + 1, 4, '0', STR_PAD_LEFT) . '00';

        User::updateOrCreate(
            ['id' => $request->datum_id],
            [
                'name' => $request->name,
                'password' => Hash::make('PW' . $username), // Use Hash::make() to hash the password
                'role' => $request->role,
                'username' => $username,
            ]
        );

        return response()->json([
            'status' => 'success',
            'pesan' => 'Data berhasil disimpan'
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json([
            'status' => 'success',
            'pesan' => 'Data berhasil dihapus'
        ]);
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect('/dashboard');
        }
        Session::flash('peringatan', 'Username atau password Anda salah');
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function setings(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
        ]);

        $data = [
            'name' => $request->nama,
            'username' => $request->username,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::where('id', $request->id)->update($data);

        return response()->json([
            'status' => 'success',
            'pesan' => 'Akun berhasil diperbarui'
        ]);
    }
}
