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
use App\Models\Instansi;
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
            'status_validasi' => $validated['status'],
            'tanggal_upload' => now(),
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
            'status_validasi' => $validated['status'],
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
        // Adaptif: jika skema baru (mahasiswa_id mengacu ke users), ambil via user id
        if (\Illuminate\Support\Facades\Schema::hasColumn('bimbingans', 'dosen_pembimbing_id')) {
            $bimbingans = \App\Models\Bimbingan::where('mahasiswa_id', auth()->id())
                ->orderByDesc('tanggal_bimbingan')
                ->orderByDesc('created_at')
                ->get();
        } else {
            $mahasiswa = auth()->user()->mahasiswa;
            $bimbingans = $mahasiswa ? $mahasiswa->bimbingans : collect();
        }
        return view('mahasiswa.bimbingan.index', compact('bimbingans'));
    }

    public function createBimbingan()
    {
        return view('mahasiswa.bimbingan.create');
    }

    public function storeBimbingan(Request $request)
    {
        $validated = $request->validate([
            'dosen' => 'nullable|integer', // fleksibel: user id dosen pembimbing
            'catatan' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:terjadwal,berlangsung,selesai,dibatalkan,pending',
        ]);

        // Pemetaan kolom untuk dua skema
        $data = [
            'catatan' => $validated['catatan'],
            'status' => $validated['status'],
        ];
        if (\Illuminate\Support\Facades\Schema::hasColumn('bimbingans', 'dosen_pembimbing_id')) {
            $data['mahasiswa_id'] = auth()->id();
            $data['dosen_pembimbing_id'] = $validated['dosen'] ?? auth()->user()->dosen_pembimbing_id ?? null;
            $data['tanggal_bimbingan'] = $validated['tanggal'];
        } else {
            $mahasiswa = auth()->user()->mahasiswa;
            $data['mahasiswa_id'] = $mahasiswa ? $mahasiswa->id : null;
            $data['dosen_id'] = $validated['dosen'];
            $data['tanggal'] = $validated['tanggal'];
        }

        \App\Models\Bimbingan::create($data);

        return redirect()->route('mahasiswa.bimbingan.index')->with('success', 'Bimbingan berhasil dibuat.');
    }

    public function editBimbingan(Bimbingan $bimbingan)
    {
        return view('mahasiswa.bimbingan.edit', compact('bimbingan'));
    }

    public function updateBimbingan(Request $request, Bimbingan $bimbingan)
    {
        $validated = $request->validate([
            'dosen' => 'nullable|integer',
            'catatan' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:terjadwal,berlangsung,selesai,dibatalkan,pending',
        ]);

        $payload = [
            'catatan' => $validated['catatan'],
            'status' => $validated['status'],
        ];
        if (\Illuminate\Support\Facades\Schema::hasColumn('bimbingans', 'dosen_pembimbing_id')) {
            $payload['dosen_pembimbing_id'] = $validated['dosen'] ?? $bimbingan->dosen_pembimbing_id;
            $payload['tanggal_bimbingan'] = $validated['tanggal'];
        } else {
            $payload['dosen_id'] = $validated['dosen'] ?? $bimbingan->dosen_id;
            $payload['tanggal'] = $validated['tanggal'];
        }

        $bimbingan->update($payload);

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
            'tanggal_upload' => now(),
            'status_verifikasi' => $validated['status'],
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

    // Usulan Instansi (verifikasi oleh admin)
    public function createInstansi()
    {
        return view('mahasiswa.instansi.create');
    }

    public function storeInstansi(Request $request)
    {
        $validated = $request->validate([
            'nama_instansi' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
        ]);

        $data = [
            'nama_instansi' => $validated['nama_instansi'],
            'alamat' => $validated['alamat'],
            'status_verifikasi' => 'pending',
        ];
        if (!empty($validated['kontak'])) $data['kontak'] = $validated['kontak'];
        if (!empty($validated['email'])) $data['email'] = $validated['email'];
        if (!empty($validated['website'])) $data['website'] = $validated['website'];

        Instansi::create($data);

        return redirect()->route('mahasiswa.instansi.create')->with('success','Usulan instansi dikirim dan menunggu verifikasi admin.');
    }

    // Seminar: daftar dan pengajuan oleh mahasiswa
    public function indexSeminar()
    {
        $user = auth()->user();
        $seminars = Seminar::where('mahasiswa_id', $user->id)
            ->orderByDesc('created_at')
            ->get();
        return view('mahasiswa.seminar.index', compact('seminars'));
    }

    public function createSeminar()
    {
        $kp = KerjaPraktek::where('mahasiswa_id', auth()->id())
            ->whereIn('status', ['disetujui','berlangsung'])
            ->latest()->first();
        if (!$kp) {
            return redirect()->route('mahasiswa.seminar.index')
                ->with('error', 'Anda belum memiliki KP aktif/disetujui.');
        }
        return view('mahasiswa.seminar.create', compact('kp'));
    }

    public function storeSeminar(Request $request)
    {
        $validated = $request->validate([
            'judul_seminar' => 'required|string|max:255',
            'abstrak' => 'nullable|string',
            'tanggal_seminar' => 'required|date',
            'metode' => 'required|in:offline,online',
            'tempat' => 'nullable|string|max:255',
            'link_online' => 'nullable|url',
            'presentasi_file' => 'nullable|file|mimes:ppt,pptx,pdf|max:5120',
        ]);

        $kp = KerjaPraktek::where('mahasiswa_id', auth()->id())
            ->whereIn('status', ['disetujui','berlangsung'])
            ->latest()->first();
        if (!$kp) {
            return redirect()->route('mahasiswa.seminar.index')
                ->with('error', 'KP aktif tidak ditemukan.');
        }

        $presentasiPath = null;
        if ($request->hasFile('presentasi_file')) {
            $presentasiPath = $request->file('presentasi_file')->store('seminar/presentasi', 'public');
        }

        Seminar::create([
            'kerja_praktek_id' => $kp->id,
            'mahasiswa_id' => auth()->id(),
            'judul_seminar' => $validated['judul_seminar'],
            'abstrak' => $validated['abstrak'] ?? null,
            'tanggal_seminar' => $validated['tanggal_seminar'],
            'metode' => $validated['metode'],
            'tempat' => $validated['tempat'] ?? null,
            'link_online' => $validated['link_online'] ?? null,
            'presentasi_file' => $presentasiPath,
            'pembimbing_penguji_id' => $kp->dosen_pembimbing_id,
            'status' => 'diajukan',
        ]);

        return redirect()->route('mahasiswa.seminar.index')
            ->with('success', 'Pengajuan seminar berhasil dibuat dan diteruskan ke dosen pembimbing.');
    }
}
