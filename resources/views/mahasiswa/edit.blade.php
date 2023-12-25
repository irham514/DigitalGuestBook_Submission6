{{-- @extends('layouts.app')

@section('content') --}}
<div class="container">
    <h1>Daftar Mahasiswa</h1>

    <form action="{{ route('mahasiswa.update', $mahasiswas->id) }}" method="POST">
    @csrf
    @method('PUT')
    Nama: <input type="text" name="nama" required><br>
    Alamat: <input type="text" name="alamat" required><br>
    Tanggal lahir: <input type="date" name="tanggal_lahir" required><br>
    <input type="submit" value="submit">

    </form>
</div>
{{-- @endsection --}}
