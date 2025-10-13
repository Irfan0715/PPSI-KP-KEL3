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
        $userId = auth()->id();
        $totalMahasiswa = \App\Models\KerjaPraktek::where('dosen_pembimbing_id', $userId)->distinct('mahasiswa_id')->count('mahasiswa_id');
        $kpMembimbingCount = \App\Models\KerjaPraktek::where('dosen_pembimbing_id', $userId)->count();
        $pendingApprovalsCount = \App\Models\KerjaPraktek::where('dosen_pembimbing_id', $userId)->where('status','diajukan')->count();
        $completedKpCount = \App\Models\KerjaPraktek::where('dosen_pembimbing_id', $userId)->where('status','selesai')->count();

        return view('dosen.dashboard', compact('totalMahasiswa','kpMembimbingCount','pendingApprovalsCount','completedKpCount'));
    }

    // CRUD Proposal (review dan approval)
    public function indexProposal()
    {
        $uid = auth()->id();
        // Ambil proposal milik mahasiswa yang dibimbing dosen ini.
        // Mapping: proposals.mahasiswa_id -> mahasiswas.id -> mahasiswas.user_id == kerja_prakteks.mahasiswa_id
        $proposals = Proposal::query()
            ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'proposals.mahasiswa_id')
            ->leftJoin('kerja_prakteks', 'kerja_prakteks.mahasiswa_id', '=', 'mahasiswas.user_id')
            ->where('kerja_prakteks.dosen_pembimbing_id', $uid)
            ->select('proposals.*')
            ->orderByDesc('proposals.created_at')
            ->get();

        // Jika belum ada relasi KP, fallback tampilkan semua untuk validasi manual
        if ($proposals->isEmpty()) {
            $proposals = Proposal::latest()->get();
        }

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
        $bimbingans = Bimbingan::query()
            ->where(function($q){
                $uid = auth()->id();
                $q->where('dosen_pembimbing_id',$uid)->orWhere('dosen_id',$uid);
            })
            ->orderByDesc('created_at')
            ->get();
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
        $nilais = Nilai::where('dosen_id', auth()->id())->orderByDesc('created_at')->get();
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

        Nilai::create([
            'mahasiswa_id' => $validated['mahasiswa_id'],
            'dosen_id' => auth()->id(),
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

    public function indexSeminar()
    {
        $uid = auth()->id();
        $seminars = \App\Models\Seminar::where(function($q) use ($uid){
            $q->where('ketua_penguji_id',$uid)
              ->orWhere('anggota_penguji_1_id',$uid)
              ->orWhere('anggota_penguji_2_id',$uid)
              ->orWhere('pembimbing_penguji_id',$uid);
        })->orderByDesc('tanggal_seminar')->get();
        return view('dosen.seminar.index', compact('seminars'));
    }

    public function updateSeminar(Request $request, \App\Models\Seminar $seminar)
    {
        $validated = $request->validate([
            'nilai_ketua_penguji' => 'nullable|numeric|min:0|max:100',
            'nilai_anggota_1' => 'nullable|numeric|min:0|max:100',
            'nilai_anggota_2' => 'nullable|numeric|min:0|max:100',
            'nilai_pembimbing' => 'nullable|numeric|min:0|max:100',
            'catatan_penilaian' => 'nullable|string',
        ]);
        $seminar->update($validated);
        $seminar->hitungNilaiAkhir();
        return back()->with('success','Penilaian seminar diperbarui');
    }
}
