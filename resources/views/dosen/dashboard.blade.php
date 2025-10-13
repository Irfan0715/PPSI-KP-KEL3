<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
            <!-- Header modern (selaras admin) -->
            <header class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="px-6 py-5 flex items-center justify-between">
                    <div>
                        <h2 class="text-xl sm:text-2xl font-semibold tracking-tight text-gray-900">Dashboard Dosen</h2>
                        <p class="text-sm text-gray-500 mt-1">Selamat datang, <span class="font-medium text-gray-700">{{ auth()->user()->name }}</span></p>
                    </div>
                </div>
            </header>

            <!-- Statistik cards -->
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <x-stat-card color="blue" label="Total Mahasiswa" :value="$totalMahasiswa ?? 0" />
                <x-stat-card color="emerald" label="KP Membimbing" :value="$kpMembimbingCount ?? 0" />
                <x-stat-card color="amber" label="Menunggu Approval" :value="$pendingApprovalsCount ?? 0" />
                <x-stat-card color="indigo" label="KP Selesai" :value="$completedKpCount ?? 0" />
            </section>

            <!-- Manajemen grid -->
            <section>
                <h3 class="text-sm font-semibold text-gray-500 tracking-wide mb-3">Aksi Cepat</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <x-manage-card href="{{ route('dosen.proposal.index') }}" color="blue" title="Validasi Proposal" desc="Review & setujui" />
                    <x-manage-card href="{{ route('dosen.bimbingan.index') }}" color="amber" title="Riwayat Bimbingan" desc="Catatan pertemuan" />
                    <x-manage-card href="{{ route('dosen.nilai.index') }}" color="indigo" title="Nilai Pembimbing" desc="Input & perbarui" />
                    <x-manage-card href="{{ route('dosen.seminar.index') }}" color="emerald" title="Penguji Seminar" desc="Penilaian seminar" />
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
