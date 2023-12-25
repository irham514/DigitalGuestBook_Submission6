<?php

use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['admin'])->group(function () {
    // Rute-rute yang hanya dapat diakses oleh admin
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    // ... tambahkan rute admin lainnya di sini ...
});
Route::middleware(['tamu'])->group(function () {
    // Rute-rute yang hanya dapat diakses oleh tamu
    Route::get('/tamu/dashboard', 'TamuController@dashboard');
    // ... tambahkan rute tamu lainnya di sini ...
});

Route::get('/index', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/update{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/destroy/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
