<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenBiasaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengawasLapanganController;
use App\Http\Controllers\KerjaPraktekController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        $user = auth()->user();
        $redirectRoutes = [
            'admin' => 'admin.dashboard',
            'dosen-biasa' => 'dosen-biasa.dashboard',
            'mahasiswa' => 'mahasiswa.dashboard',
            'pengawas-lapangan' => 'pengawas-lapangan.dashboard',
        ];

        foreach ($redirectRoutes as $role => $route) {
            if ($user->hasRole($role)) {
                return redirect()->route($route);
            }
        }

        // Default fallback untuk user tanpa role atau role tidak dikenali
        return redirect()->route('mahasiswa.dashboard');
    }
    return view('welcome');
});

// Test route untuk debugging authentication
Route::get('/test-auth', function () {
    return response()->json([
        'authenticated' => auth()->check(),
        'user' => auth()->user(),
        'session' => session()->all(),
    ]);
});

// Auth routes hanya untuk guest (belum login)
Route::middleware('guest')->group(function () {
    require __DIR__.'/auth.php';
});

// Dashboard umum (untuk fallback jika diperlukan)
Route::get('/dashboard', function () {
    // Redirect ke dashboard berdasarkan role user
    $user = auth()->user();
    $redirectRoutes = [
        'admin' => 'admin.dashboard',
        'dosen-biasa' => 'dosen-biasa.dashboard',
        'mahasiswa' => 'mahasiswa.dashboard',
        'pengawas-lapangan' => 'pengawas-lapangan.dashboard',
    ];

    foreach ($redirectRoutes as $role => $route) {
        if ($user->hasRole($role)) {
            return redirect()->route($route);
        }
    }

    // Default fallback
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');


// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Role-based routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::post('/users/{user}/assign-role', [AdminController::class, 'assignRole'])->name('assign-role');
});

Route::middleware(['auth', 'role:dosen-biasa'])->prefix('dosen-biasa')->name('dosen-biasa.')->group(function () {
    Route::get('/dashboard', [DosenBiasaController::class, 'dashboard'])->name('dashboard');
    Route::get('/jadwal', [DosenBiasaController::class, 'jadwal'])->name('jadwal');
    Route::get('/materi', [DosenBiasaController::class, 'materi'])->name('materi');
});

Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('dashboard');
    Route::get('/profil', [MahasiswaController::class, 'profil'])->name('profil');
    Route::get('/nilai', [MahasiswaController::class, 'nilai'])->name('nilai');
    Route::get('/jadwal-kuliah', [MahasiswaController::class, 'jadwalKuliah'])->name('jadwal-kuliah');
    Route::get('/tugas', [MahasiswaController::class, 'tugas'])->name('tugas');
});

Route::middleware(['auth', 'role:pengawas-lapangan'])->prefix('pengawas-lapangan')->name('pengawas-lapangan.')->group(function () {
    Route::get('/dashboard', [PengawasLapanganController::class, 'dashboard'])->name('dashboard');
    Route::get('/laporan', [PengawasLapanganController::class, 'laporan'])->name('laporan');
    Route::get('/jadwal-pengawasan', [PengawasLapanganController::class, 'jadwalPengawasan'])->name('jadwal-pengawasan');
    Route::get('/evaluasi', [PengawasLapanganController::class, 'evaluasi'])->name('evaluasi');
});

// Kerja Praktek (KP) Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('kerja-praktek', KerjaPraktekController::class);

    Route::post('kerja-praktek/{kerjaPraktek}/submit', [KerjaPraktekController::class, 'submit'])->name('kerja-praktek.submit');
    Route::post('kerja-praktek/{kerjaPraktek}/approve', [KerjaPraktekController::class, 'approve'])->name('kerja-praktek.approve');
    Route::post('kerja-praktek/{kerjaPraktek}/reject', [KerjaPraktekController::class, 'reject'])->name('kerja-praktek.reject');
    Route::post('kerja-praktek/{kerjaPraktek}/start', [KerjaPraktekController::class, 'start'])->name('kerja-praktek.start');
    Route::post('kerja-praktek/{kerjaPraktek}/complete', [KerjaPraktekController::class, 'complete'])->name('kerja-praktek.complete');
    Route::post('kerja-praktek/{kerjaPraktek}/upload-laporan', [KerjaPraktekController::class, 'uploadLaporan'])->name('kerja-praktek.upload-laporan');

    Route::get('kerja-praktek/{kerjaPraktek}/download/{type}', [KerjaPraktekController::class, 'downloadFile'])->name('kerja-praktek.download');
});
