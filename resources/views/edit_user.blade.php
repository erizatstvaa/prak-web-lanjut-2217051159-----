<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User_PWL</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #ffe6f2;
            font-family: 'Arial', sans-serif;
            color: #ff69b4;
            text-align: center;
            padding: 20px;
        }
        h1 {
            color: pink;
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        form {
            background-color: #fff0f5;
            border: 2px solid #ffb6c1;
            border-radius: 10px;
            display: inline-block;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            font-size: 1.1em;
            color: #ff69b4;
        }
        input[type="text"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #ffb6c1;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #ff69b4;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1.2em;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #ff1493;
        }
        .btn-back {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: pink;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            
        }
        .

        .btn-add{
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            color: white;
            background-color: #ff9999;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-add:hover {
            background-color: #fff0f5;
        }
         .form-group {
        margin: 10px 0;
        }
        .form-group label {
            display: block;
            color: pink;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: pink;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: #333;
        }
        .form-group button:hover {
            background-color: white;
        }
        .form-group a {
            color: #333;
        }
</style>
</head> 
@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <h1 class="text-center">Edit Data User</h1>
    <form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $user->nama) }}">
        </div>
        <!-- <div class="form-group">
            <label for="npm">NPM</label>
            <input type="text" class="form-control" name="npm" id="npm" value="{{ old('npm', $user->npm) }}">
        </div> -->
        <div class="form-group">
            <label for="ipk">IPK</label>
            <input type="text" class="form-control" name="ipk" id="ipk" value="{{ old('ipk', $user->ipk) }}">
        </div>
        <div class="form-group">
            <label for="kelas_id">Kelas</label>
            <select class="form-select" name="kelas_id" id="kelas_id" required>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}" {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" class="form-control">
            @if($user->foto)
                <img src="{{ asset($user->foto) }}" alt="User Photo" width="150" class="mt-2">
            @endif
        </div>
        <br>
        <div class="form-group">
            <button><a href="{{ route('users.index') }}">Kembali</a></button>
            <button type="submit">Submit</button>
        </div>

    </form>
</div>

@endsection
</html>