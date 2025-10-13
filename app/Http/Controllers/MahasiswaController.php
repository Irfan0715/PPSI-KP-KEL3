<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\KerjaPraktek;
use App\Models\Seminar;
use Illuminate\Support\Facades\Schema;
use App\Models\Proposal;
use App\Models\Bimbingan;
use App\Models\Laporan;
use App\Models\Nilai;
use App\Models\Kuesioner;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;

        $kpAktifCount = Schema::hasTable('kerja_prakteks')
            ? KerjaPraktek::where('mahasiswa_id', $user->id)
                ->whereIn('status', ['draft','diajukan','disetujui','berlangsung'])
                ->count()
            : 0;
        $bimbinganCount = Schema::hasTable('bimbingans')
            ? Bimbingan::where('mahasiswa_id', optional($mahasiswa)->id)->count()
            : 0;
        $laporanCount = Schema::hasTable('laporans')
            ? Laporan::where('mahasiswa_id', optional($mahasiswa)->id)->count()
            : 0;
        $seminarCount = Schema::hasTable('seminars')
            ? Seminar::where('mahasiswa_id', $user->id)->count()
            : 0;

        return view('mahasiswa.dashboard', compact(
            'mahasiswa', 'kpAktifCount', 'bimbinganCount', 'laporanCount', 'seminarCount'
        ));
    }

    // CRUD Pendaftaran KP (pilih instansi atau ajukan baru)
    public function indexKP()
    {
        // TODO: Implement
        return view('mahasiswa.kp.index');
    }

    public function createKP()
    {
        // TODO: Implement
        return view('mahasiswa.kp.create');
    }

    public function storeKP(Request $request)
    {
        // TODO: Implement
        return redirect()->route('mahasiswa.kp.index');
    }

    // CRUD Proposal
    public function indexProposal()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $proposals = $mahasiswa->proposals;
        return view('mahasiswa.proposal.index', compact('proposals'));
    }

    public function createProposal()
    {
        return view('mahasiswa.proposal.create');
    }

    public function storeProposal(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'file_proposal' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'status' => 'required|in:draft,diajukan,disetujui,ditolak',
        ]);

        $mahasiswa = auth()->user()->mahasiswa;

        $filePath = $request->file('file_proposal')->store('proposals', 'public');

        Proposal::create([
            'mahasiswa_id' => $mahasiswa->id,
            'judul' => $validated['judul'],
            'file_proposal' => $filePath,
            'status' => $validated['status'],
        ]);

        return redirect()->route('mahasiswa.proposal.index')->with('success', 'Proposal berhasil dibuat.');
    }

    public function editProposal(Proposal $proposal)
    {
        return view('mahasiswa.proposal.edit', compact('proposal'));
    }

    public function updateProposal(Request $request, Proposal $proposal)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'file_proposal' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'status' => 'required|in:draft,diajukan,disetujui,ditolak',
        ]);

        if ($request->hasFile('file_proposal')) {
            $filePath = $request->file('file_proposal')->store('proposals', 'public');
            $proposal->file_proposal = $filePath;
        }

        $proposal->update([
            'judul' => $validated['judul'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('mahasiswa.proposal.index')->with('success', 'Proposal berhasil diperbarui.');
    }

    public function destroyProposal(Proposal $proposal)
    {
        $proposal->delete();
        return redirect()->route('mahasiswa.proposal.index')->with('success', 'Proposal berhasil dihapus.');
    }

    // CRUD Bimbingan (catatan konsultasi)
    public function indexBimbingan()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $bimbingans = $mahasiswa->bimbingans;
        return view('mahasiswa.bimbingan.index', compact('bimbingans'));
    }

    public function createBimbingan()
    {
        return view('mahasiswa.bimbingan.create');
    }

    public function storeBimbingan(Request $request)
    {
        $validated = $request->validate([
            'dosen_id' => 'required|exists:dosens,id',
            'catatan' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:terjadwal,berlangsung,selesai,dibatalkan',
        ]);

        $mahasiswa = auth()->user()->mahasiswa;

        Bimbingan::create([
            'mahasiswa_id' => $mahasiswa->id,
            'dosen_id' => $validated['dosen_id'],
            'catatan' => $validated['catatan'],
            'tanggal' => $validated['tanggal'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('mahasiswa.bimbingan.index')->with('success', 'Bimbingan berhasil dibuat.');
    }

    public function editBimbingan(Bimbingan $bimbingan)
    {
        return view('mahasiswa.bimbingan.edit', compact('bimbingan'));
    }

    public function updateBimbingan(Request $request, Bimbingan $bimbingan)
    {
        $validated = $request->validate([
            'dosen_id' => 'required|exists:dosens,id',
            'catatan' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:terjadwal,berlangsung,selesai,dibatalkan',
        ]);

        $bimbingan->update($validated);

        return redirect()->route('mahasiswa.bimbingan.index')->with('success', 'Bimbingan berhasil diperbarui.');
    }

    public function destroyBimbingan(Bimbingan $bimbingan)
    {
        $bimbingan->delete();
        return redirect()->route('mahasiswa.bimbingan.index')->with('success', 'Bimbingan berhasil dihapus.');
    }

    // CRUD Laporan akhir
    public function indexLaporan()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $laporans = $mahasiswa->laporans;
        return view('mahasiswa.laporan.index', compact('laporans'));
    }

    public function createLaporan()
    {
        return view('mahasiswa.laporan.create');
    }

    public function storeLaporan(Request $request)
    {
        $validated = $request->validate([
            'file_laporan' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'status' => 'required|in:draft,diajukan,disetujui,ditolak',
        ]);

        $mahasiswa = auth()->user()->mahasiswa;

        $filePath = $request->file('file_laporan')->store('laporans', 'public');

        Laporan::create([
            'mahasiswa_id' => $mahasiswa->id,
            'file_laporan' => $filePath,
            'status' => $validated['status'],
        ]);

        return redirect()->route('mahasiswa.laporan.index')->with('success', 'Laporan berhasil dibuat.');
    }

    public function editLaporan(Laporan $laporan)
    {
        return view('mahasiswa.laporan.edit', compact('laporan'));
    }

    public function updateLaporan(Request $request, Laporan $laporan)
    {
        $validated = $request->validate([
            'file_laporan' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'status' => 'required|in:draft,diajukan,disetujui,ditolak',
        ]);

        if ($request->hasFile('file_laporan')) {
            $filePath = $request->file('file_laporan')->store('laporans', 'public');
            $laporan->file_laporan = $filePath;
        }

        $laporan->update([
            'status' => $validated['status'],
        ]);

        return redirect()->route('mahasiswa.laporan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroyLaporan(Laporan $laporan)
    {
        $laporan->delete();
        return redirect()->route('mahasiswa.laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }

    // Melihat hasil nilai
    public function nilai()
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;
        if (!$mahasiswa) {
            // Jika profil mahasiswa belum ada, tampilkan kosong agar tidak error
            $nilais = collect();
        } else {
            $nilais = $mahasiswa->nilais()->latest()->get();
        }
        return view('mahasiswa.nilai', compact('nilais'));
    }

    // CRUD Kuesioner mahasiswa
    public function indexKuesioner()
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;
        $kuesioners = $mahasiswa ? $mahasiswa->kuesioners : collect();
        return view('mahasiswa.kuesioner.index', compact('kuesioners'));
    }

    public function createKuesioner()
    {
        return view('mahasiswa.kuesioner.create');
    }

    public function storeKuesioner(Request $request)
    {
        $validated = $request->validate([
            'pembimbing_lapangan_id' => 'required|exists:users,id',
            'isi_kuesioner' => 'required|string',
            'tipe' => 'required|in:mahasiswa,instansi',
        ]);

        $mahasiswa = auth()->user()->mahasiswa;
        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.kuesioner.index')
                ->with('error', 'Profil mahasiswa belum dibuat. Hubungi admin.');
        }

        Kuesioner::create([
            'mahasiswa_id' => $mahasiswa->id,
            'pembimbing_lapangan_id' => $validated['pembimbing_lapangan_id'],
            'isi_kuesioner' => $validated['isi_kuesioner'],
            'tipe' => $validated['tipe'],
        ]);

        return redirect()->route('mahasiswa.kuesioner.index')->with('success', 'Kuesioner berhasil dibuat.');
    }

    public function editKuesioner(Kuesioner $kuesioner)
    {
        return view('mahasiswa.kuesioner.edit', compact('kuesioner'));
    }

    public function updateKuesioner(Request $request, Kuesioner $kuesioner)
    {
        $validated = $request->validate([
            'pembimbing_lapangan_id' => 'required|exists:users,id',
            'isi_kuesioner' => 'required|string',
            'tipe' => 'required|in:mahasiswa,instansi',
        ]);

        $kuesioner->update($validated);

        return redirect()->route('mahasiswa.kuesioner.index')->with('success', 'Kuesioner berhasil diperbarui.');
    }

    public function destroyKuesioner(Kuesioner $kuesioner)
    {
        $kuesioner->delete();
        return redirect()->route('mahasiswa.kuesioner.index')->with('success', 'Kuesioner berhasil dihapus.');
    }
}
