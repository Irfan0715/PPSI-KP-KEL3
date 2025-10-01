<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KerjaPraktek;
use App\Models\Bimbingan;
use App\Models\Seminar;

class MahasiswaController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        // Get KP statistics
        $kpAktifCount = KerjaPraktek::where('mahasiswa_id', $user->id)
            ->whereIn('status', ['disetujui', 'berlangsung'])
            ->count();

        $bimbinganCount = Bimbingan::whereHas('kerjaPraktek', function($query) use ($user) {
            $query->where('mahasiswa_id', $user->id);
        })->count();

        $laporanCount = KerjaPraktek::where('mahasiswa_id', $user->id)
            ->whereNotNull('laporan_akhir_file')
            ->count();

        $seminarCount = Seminar::whereHas('kerjaPraktek', function($query) use ($user) {
            $query->where('mahasiswa_id', $user->id);
        })->count();

        // Get latest KP status
        $latestKp = KerjaPraktek::where('mahasiswa_id', $user->id)
            ->latest()
            ->first();
        $latestKpStatus = $latestKp ? ucfirst($latestKp->status) : null;

        // Progress steps
        $progressSteps = [];
        if ($latestKp) {
            $progressSteps['proposal'] = $latestKp->status !== 'draft' ? '✅' : '❌';
            $progressSteps['bimbingan'] = $bimbinganCount > 0 ? '✅' : '❌';
            $progressSteps['seminar'] = $seminarCount > 0 ? '✅' : '❌';
        } else {
            $progressSteps['proposal'] = '❌';
            $progressSteps['bimbingan'] = '❌';
            $progressSteps['seminar'] = '❌';
        }

        return view('mahasiswa.dashboard', compact(
            'kpAktifCount',
            'bimbinganCount',
            'laporanCount',
            'seminarCount',
            'latestKpStatus',
            'progressSteps'
        ));
    }

    public function profil()
    {
        return view('mahasiswa.profil');
    }

    public function nilai()
    {
        // Placeholder untuk fitur melihat nilai
        return view('mahasiswa.nilai');
    }

    public function jadwalKuliah()
    {
        // Placeholder untuk fitur jadwal kuliah
        return view('mahasiswa.jadwal-kuliah');
    }

    public function tugas()
    {
        // Placeholder untuk fitur tugas dan assignment
        return view('mahasiswa.tugas');
    }
}
