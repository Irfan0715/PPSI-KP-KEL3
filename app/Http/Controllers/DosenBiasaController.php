<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KerjaPraktek;

class DosenBiasaController extends Controller
{
    public function dashboard()
    {
        $totalMahasiswa = User::whereHas('roles', function($query) {
            $query->where('slug', 'mahasiswa');
        })->count();

        $totalDosen = User::whereHas('roles', function($query) {
            $query->where('slug', 'dosen-biasa');
        })->count();

        // KP Statistics for Dosen
        $kpMembimbingCount = KerjaPraktek::where('dosen_pembimbing_id', auth()->id())
            ->whereIn('status', ['disetujui', 'berlangsung'])
            ->count();

        $pendingApprovalsCount = KerjaPraktek::where('dosen_pembimbing_id', auth()->id())
            ->where('status', 'diajukan')
            ->count();

        $completedKpCount = KerjaPraktek::where('dosen_pembimbing_id', auth()->id())
            ->where('status', 'selesai')
            ->count();

        // Recent KP Mahasiswa
        $recentKpMahasiswa = KerjaPraktek::with(['mahasiswa'])
            ->where('dosen_pembimbing_id', auth()->id())
            ->whereIn('status', ['disetujui', 'berlangsung', 'diajukan'])
            ->latest()
            ->limit(6)
            ->get();

        return view('dosen-biasa.dashboard', compact(
            'totalMahasiswa',
            'totalDosen',
            'kpMembimbingCount',
            'pendingApprovalsCount',
            'completedKpCount',
            'recentKpMahasiswa'
        ));
    }

    public function jadwal()
    {
        // Placeholder untuk fitur jadwal mengajar
        return view('dosen-biasa.jadwal');
    }

    public function materi()
    {
        // Placeholder untuk fitur materi kuliah
        return view('dosen-biasa.materi');
    }
}
