<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create(){
        return view('mahasiswa.create');
    }

    public function store(Request $request){
        $request -> validate([
            'nama'          => 'required|string|max:255',
            'alamat'        => 'required|string|max:255',
            'tanggal_lahir' => 'required|date'
        ]);
        Mahasiswa::create([
            'nama'          => $request->input('nama'),
            'alamat'        => $request->input('alamat'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
        ]);
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil disimpan.');
    }

    public function edit($id){
        $mahasiswas = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mahasiswas'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama'          => 'required|string|max:255',
            'alamat'        => 'required|string|max:255',
            'tanggal_lahir' => 'required|date'
        ]);
        $mahasiswas = Mahasiswa::find($id);
        $mahasiswas->nama = $request->input('nama');
        $mahasiswas->alamat = $request->input('alamat');
        $mahasiswas->tanggal_lahir = $request->input('tanggal_lahir');
        $mahasiswas->save();
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($id){
        $mahasiswas = Mahasiswa::find($id);
        if ($mahasiswas) {
            $mahasiswas->delete();
            return  redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil di hapus.');
        }else {
            return redirect()->route('mahasiswa.index')->with('error', 'Data mahasiswa tidak ditemukan');
        }
    }
}
