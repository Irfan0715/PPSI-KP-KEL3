<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Kuesioner;
use Illuminate\Http\Request;

class PembimbingLapanganController extends Controller
{
    public function dashboard()
    {
        return view('pembimbing-lapangan.dashboard');
    }

    // CRUD Nilai (penilaian mahasiswa)
    public function indexNilai()
    {
        $nilais = Nilai::where('pembimbing_lapangan_id', auth()->id())->get();
        return view('pembimbing-lapangan.nilai.index', compact('nilais'));
    }

    public function editNilai(Nilai $nilai)
    {
        return view('pembimbing-lapangan.nilai.edit', compact('nilai'));
    }

    public function updateNilai(Request $request, Nilai $nilai)
    {
        $validated = $request->validate([
            'nilai_lapangan' => 'nullable|numeric|min:0|max:100',
        ]);

        $nilai->update($validated);

        return redirect()->route('pembimbing-lapangan.nilai.index')->with('success', 'Nilai berhasil diperbarui.');
    }

    // CRUD Kuesioner (feedback mahasiswa)
    public function indexKuesioner()
    {
        $kuesioners = Kuesioner::where('pembimbing_lapangan_id', auth()->id())->get();
        return view('pembimbing-lapangan.kuesioner.index', compact('kuesioners'));
    }

    public function showKuesioner(Kuesioner $kuesioner)
    {
        return view('pembimbing-lapangan.kuesioner.show', compact('kuesioner'));
    }

    // TODO: Laporan monitoring mahasiswa
    // TODO: Evaluasi mahasiswa
}
