<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPendaftarController;
use App\Http\Controllers\DataPendaftarUserController;
use App\Http\Controllers\DokumenPendaftarController;
use App\Http\Controllers\DokumenPendaftarUserController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KriteriaUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\RankingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage');
});

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'create'])->middleware('guest');
Route::post('/register', [LoginController::class, 'store'])->name('register.store')->middleware('guest');

Route::middleware(['auth'])->group(function () {    
    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        
        Route::resource('datapendaftar', DataPendaftarController::class);
        Route::resource('dokumenpendaftar', DokumenPendaftarController::class);
        Route::resource('kriteria', KriteriaController::class);
        Route::resource('penilaian', PenilaianController::class);
        Route::resource('ranking', RankingController::class);
        Route::resource('alternatif', AlternatifController::class);
        Route::resource('pengumuman', PengumumanController::class);
        
    });
    
    Route::get('/formdatapendaftar', [DataPendaftarUserController::class, 'index'])->name('formdatapendaftar.index');
    Route::post('/formdatapendaftar', [DataPendaftarUserController::class, 'store'])->name('formdatapendaftar.store');
    Route::put('/formdatapendaftar/{id}', [DataPendaftarUserController::class, 'update'])->name('formdatapendaftar.update');
   
    Route::get('/dokumenpendaftaruser', [DokumenPendaftarUserController::class, 'index'])->name('dokumenpendaftaruser.index');
    Route::post('/dokumenpendaftaruser', [DokumenPendaftarUserController::class, 'store'])->name('dokumenpendaftaruser.store');
    Route::put('/dokumenpendaftaruser/{id}', [DokumenPendaftarUserController::class, 'update'])->name('dokumenpendaftaruser.update');

    Route::get('/kriteriauser', [KriteriaUserController::class, 'index'])->name('kriteriauser.index');
    Route::post('/kriteriauser', [KriteriaUserController::class, 'store'])->name('kriteriauser.store');
    Route::put('/kriteriauser/{id}', [KriteriaUserController::class, 'update'])->name('kriteriauser.update');
    
    Route::get('/pengumumanuser', [PengumumanController::class, 'user'])->name('pengumumanuser');

    Route::get('/dashboarduser', [DashboardController::class, 'user']);

});
