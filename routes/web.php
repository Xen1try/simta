<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckPermission;

use App\Livewire\Admin\RoleManager;
use App\Livewire\Admin\KontrolFase;

use App\Livewire\Dosen\InputTopik;
use App\Livewire\Mahasiswa\InputJudulMandiri;
use App\Livewire\Mahasiswa\PortofolioSkill;
use App\Livewire\Akademik\ApprovalKaprodi;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // Halaman Role Manager (Diproteksi langsung di dalam Component Livewire)
    Route::get('/admin/roles', RoleManager::class)->name('admin.roles');

    // Halaman Kontrol Fase (Diproteksi menggunakan Dynamic RBAC Middleware)
    Route::middleware(CheckPermission::class . ':fase.kontrol')->group(function () {
        Route::get('/admin/kontrol-fase', KontrolFase::class)->name('admin.kontrol-fase');
    });

    // Modul Dosen
    Route::get('/dosen/input-topik', InputTopik::class)->name('dosen.input-topik');
    
    // Modul Mahasiswa
    Route::get('/mahasiswa/judul-mandiri', InputJudulMandiri::class)->name('mahasiswa.judul-mandiri');
    Route::get('/mahasiswa/portofolio', PortofolioSkill::class)->name('mahasiswa.portofolio');

    // Modul Kaprodi (Sebaiknya dibungkus middleware CheckPermission 'judul.approve' jika di server produksi)
    Route::get('/akademik/approval', ApprovalKaprodi::class)->name('akademik.approval');
});

require __DIR__.'/settings.php';