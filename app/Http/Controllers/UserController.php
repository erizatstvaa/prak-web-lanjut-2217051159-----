<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $users = UserModel::with('kelas')->get(); 

        return view('list_user', [
            'title' => 'List User',
            'users' => $users,
        ]); 
    }

    public function profile($nama = '', $kelas = '', $npm = ''){
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];
        return view('profile', $data);
    }

    // Menampilkan halaman create user
    public function create(){

        return view('create_user', [
            'title' => 'Create User',
            'kelas' => $kelas,
        ]);
    }
      
    // Menyimpan data user
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName(); 
            $foto->move(public_path('uploads/img'), $fotoName); 
            $fotoPath = 'uploads/img/' . $fotoName;
        }

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoPath,
        ]);

            return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
        }

        public function show($id)
        {
            $user = $this->userModel->findOrFail($id);
    
            return view('profile', [
                'title' => 'User Profile',
                'user' => $user,
                'profile_picture' => $user->foto ?? 'assets/img/default.jpg',
            ]);
        }
    
    }
