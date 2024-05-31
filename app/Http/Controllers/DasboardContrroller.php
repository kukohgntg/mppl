<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DasboardContrroller extends Controller
{
    public function index()
    {
        $users = User::count('id');
        $berita = \App\Brita::count('id');
        $potensi = \App\Potensi::count('id');
        $galery = \App\Galery::count('id');



        return view('admin/dashboard/index', compact('users', 'berita', 'potensi', 'galery'));
    }
}
