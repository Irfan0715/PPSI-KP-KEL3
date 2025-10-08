<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Proposal;
use App\Models\Bimbingan;
use App\Models\Nilai;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function dashboard()
    {
        $dosen = auth()->user()->dosen;
        return view('dosen.dashboard', compact('dosen'));
    }

    // CRUD Proposal (review dan approval)
    public function indexProposal()
    {
        $dosen = auth()->user()->dosen;
        $proposals = Proposal::where('dosen_id', $dosen->id)->get();
        return view('dosen.proposal.index', compact('proposals'));
    }

    public function showProposal(Proposal $proposal)
    {
        return view('dosen.proposal.show', compact('proposal'));
    }

    public function approveProposal(Proposal $proposal)
    {
        $proposal->update(['status' => 'disetujui']);
        return redirect()->route('dosen.proposal.index')->with('success', 'Proposal disetujui.');
    }

    public function rejectProposal(Proposal $proposal)
    {
        $proposal->update(['status' => 'ditolak']);
        return redirect()->route('dosen.proposal.index')->with('success', 'Proposal ditolak.');
    }

    // CRUD Bimbingan (jadwal dan catatan)
    public function indexBimbingan()
    {
        $dosen = auth()->user()->dosen;
        $bimbingans = $dosen->bimbingans;
        return view('dosen.bimbingan.index', compact('bimbingans'));
    }

    public function showBimbingan(Bimbingan $bimbingan)
    {
        return view('dosen.bimbingan.show', compact('bimbingan'));
    }

    public function updateBimbingan(Request $request, Bimbingan $bimbingan)
    {
        $validated = $request->validate([
            'catatan' => 'required|string',
            'status' => 'required|in:terjadwal,berlangsung,selesai,dibatalkan',
        ]);

        $bimbingan->update($validated);

        return redirect()->route('dosen.bimbingan.index')->with('success', 'Bimbingan berhasil diperbarui.');
    }

    // CRUD Nilai (penilaian mahasiswa)
    public function indexNilai()
    {
        $dosen = auth()->user()->dosen;
        $nilais = $dosen->nilais;
        return view('dosen.nilai.index', compact('nilais'));
    }

    public function createNilai()
    {
        return view('dosen.nilai.create');
    }

    public function storeNilai(Request $request)
    {
        $validated = $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'pembimbing_lapangan_id' => 'required|exists:users,id',
            'nilai_pembimbing' => 'nullable|numeric|min:0|max:100',
            'nilai_lapangan' => 'nullable|numeric|min:0|max:100',
            'nilai_seminar' => 'nullable|numeric|min:0|max:100',
            'total_nilai' => 'nullable|numeric|min:0|max:100',
        ]);

        $dosen = auth()->user()->dosen;

        Nilai::create([
            'mahasiswa_id' => $validated['mahasiswa_id'],
            'dosen_id' => $dosen->id,
            'pembimbing_lapangan_id' => $validated['pembimbing_lapangan_id'],
            'nilai_pembimbing' => $validated['nilai_pembimbing'],
            'nilai_lapangan' => $validated['nilai_lapangan'],
            'nilai_seminar' => $validated['nilai_seminar'],
            'total_nilai' => $validated['total_nilai'],
        ]);

        return redirect()->route('dosen.nilai.index')->with('success', 'Nilai berhasil dibuat.');
    }

    public function editNilai(Nilai $nilai)
    {
        return view('dosen.nilai.edit', compact('nilai'));
    }

    public function updateNilai(Request $request, Nilai $nilai)
    {
        $validated = $request->validate([
            'nilai_pembimbing' => 'nullable|numeric|min:0|max:100',
            'nilai_lapangan' => 'nullable|numeric|min:0|max:100',
            'nilai_seminar' => 'nullable|numeric|min:0|max:100',
            'total_nilai' => 'nullable|numeric|min:0|max:100',
        ]);

        $nilai->update($validated);

        return redirect()->route('dosen.nilai.index')->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroyNilai(Nilai $nilai)
    {
        $nilai->delete();
        return redirect()->route('dosen.nilai.index')->with('success', 'Nilai berhasil dihapus.');
    }

    // TODO: Seminar penguji
}
