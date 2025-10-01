<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KerjaPraktek;
use App\Models\Seminar;

class PengawasLapanganController extends Controller
{
    public function dashboard()
    {
        // KP Statistics for Pengawas Lapangan
        $mahasiswaDibimbingCount = KerjaPraktek::where('pengawas_lapangan_id', auth()->id())
            ->whereIn('status', ['disetujui', 'berlangsung'])
            ->count();

        $laporanMasukCount = KerjaPraktek::where('pengawas_lapangan_id', auth()->id())
            ->whereNotNull('laporan_akhir_file')
            ->count();

        $jadwalPengawasanCount = KerjaPraktek::where('pengawas_lapangan_id', auth()->id())
            ->where('status', 'berlangsung')
            ->count();

        $evaluasiSelesaiCount = Seminar::whereHas('kerjaPraktek', function($query) {
            $query->where('pengawas_lapangan_id', auth()->id());
        })->where('hasil', 'lulus')
        ->count();

        // Recent Mahasiswa Dibimbing
        $recentMahasiswaDibimbing = KerjaPraktek::with(['mahasiswa', 'instansi'])
            ->where('pengawas_lapangan_id', auth()->id())
            ->whereIn('status', ['disetujui', 'berlangsung'])
            ->latest()
            ->limit(6)
            ->get();

        // Today's schedules (placeholder - would need proper date filtering)
        $todaySchedules = KerjaPraktek::with(['mahasiswa', 'instansi'])
            ->where('pengawas_lapangan_id', auth()->id())
            ->where('status', 'berlangsung')
            ->latest()
            ->limit(4)
            ->get();

        return view('pengawas-lapangan.dashboard', compact(
            'mahasiswaDibimbingCount',
            'laporanMasukCount',
            'jadwalPengawasanCount',
            'evaluasiSelesaiCount',
            'recentMahasiswaDibimbing',
            'todaySchedules'
        ));
    }

    public function laporan()
    {
        // Placeholder untuk fitur laporan pengawasan
        return view('pengawas-lapangan.laporan');
    }

    public function jadwalPengawasan()
    {
        // Placeholder untuk fitur jadwal pengawasan
        return view('pengawas-lapangan.jadwal-pengawasan');
    }

    public function evaluasi()
    {
        // Placeholder untuk fitur evaluasi mahasiswa
        return view('pengawas-lapangan.evaluasi');
    }
}
