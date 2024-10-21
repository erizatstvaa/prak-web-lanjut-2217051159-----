<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public function profile($nama = '', $kelas = '', $npm = ''){
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];
        return view('profile', $data);
    }

    // Menampilkan halaman create user
    public function create()
    {
        return view('create_user', [
            'kelas' => Kelas::all(),
        ]);
    }
      
    // Menyimpan data user
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ],
        [
            'nama.required' => 'Nama harus diisi.',
            'npm.required' => 'NPM harus diisi.',
            'kelas_id.required' => 'Kelas harus dipilih.',
        ]);


        $user = UserModel::create($validatedData);

        $user->load('kelas');

        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'kelas tidak ditemukan',
        ]);
    }
}
