<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Kuesioner;
use App\Models\Kuota;
use App\Models\Instansi;
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

    public function createNilai()
    {
        return view('pembimbing-lapangan.nilai.create');
    }

    public function storeNilai(Request $request)
    {
        $validated = $request->validate([
            'mahasiswa_id' => 'required|integer',
            'nilai_lapangan' => 'nullable|numeric|min:0|max:100',
        ]);

        Nilai::create([
            'mahasiswa_id' => $validated['mahasiswa_id'],
            'dosen_id' => null,
            'pembimbing_lapangan_id' => auth()->id(),
            'nilai_lapangan' => $validated['nilai_lapangan'],
        ]);

        return redirect()->route('lapangan.nilai.index')->with('success', 'Nilai lapangan ditambahkan.');
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

    public function createKuesioner()
    {
        return view('pembimbing-lapangan.kuesioner.create');
    }

    public function storeKuesioner(Request $request)
    {
        $validated = $request->validate([
            'isi_kuesioner' => 'required|string',
        ]);

        Kuesioner::create([
            'pembimbing_lapangan_id' => auth()->id(),
            'mahasiswa_id' => null,
            'isi_kuesioner' => $validated['isi_kuesioner'],
            'tipe' => 'instansi',
        ]);

        return redirect()->route('lapangan.kuesioner.index')->with('success', 'Kuesioner tersimpan.');
    }

    public function editKuesioner(Kuesioner $kuesioner)
    {
        return view('pembimbing-lapangan.kuesioner.edit', compact('kuesioner'));
    }

    public function updateKuesioner(Request $request, Kuesioner $kuesioner)
    {
        $validated = $request->validate([
            'isi_kuesioner' => 'required|string',
        ]);
        $kuesioner->update($validated);
        return redirect()->route('lapangan.kuesioner.index')->with('success', 'Kuesioner diperbarui.');
    }

    // Kuota tahun depan
    public function indexKuota()
    {
        $kuotas = Kuota::with('instansi')->orderByDesc('tahun')->get();
        return view('pembimbing-lapangan.kuota.index', compact('kuotas'));
    }

    public function createKuota()
    {
        $instansis = Instansi::orderBy('nama_instansi')->get();
        return view('pembimbing-lapangan.kuota.create', compact('instansis'));
    }

    public function storeKuota(Request $request)
    {
        $validated = $request->validate([
            'instansi_id' => 'required|exists:instansis,id',
            'tahun' => 'required|integer',
            'jumlah' => 'required|integer|min:1',
        ]);
        Kuota::create($validated);
        return redirect()->route('lapangan.kuota.index')->with('success', 'Usulan kuota tersimpan.');
    }

    public function editKuota(Kuota $kuota)
    {
        $instansis = Instansi::orderBy('nama_instansi')->get();
        return view('pembimbing-lapangan.kuota.edit', compact('kuota','instansis'));
    }

    public function updateKuota(Request $request, Kuota $kuota)
    {
        $validated = $request->validate([
            'instansi_id' => 'required|exists:instansis,id',
            'tahun' => 'required|integer',
            'jumlah' => 'required|integer|min:1',
        ]);
        $kuota->update($validated);
        return redirect()->route('lapangan.kuota.index')->with('success', 'Usulan kuota diperbarui.');
    }

    // TODO: Laporan monitoring mahasiswa
    // TODO: Evaluasi mahasiswa
}
