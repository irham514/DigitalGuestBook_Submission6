@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Mahasiswa</h1>

    <form action="{{ route('mahasiswa.store') }}" method="POST">
    {{ csrf_field() }}
    Nama: <input type="text" name="nama" required><br>
    Alamat: <input type="text" name="alamat" required><br>
    Tanggal lahir: <input type="date" name="tanggal_lahir" required><br>
    <input type="submit" value="submit">

    </form>
</div>
@endsection
