<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($nama = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => 'C',
            'npm' => '2217051159',
           ];
        return view('profile', $data);
    }
}

