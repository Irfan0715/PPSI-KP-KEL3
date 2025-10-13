<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard Dosen</h2>
            <div class="text-sm text-gray-600">Selamat datang, {{ auth()->user()->name }}!</div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="rounded-xl p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow">
                    <div class="text-sm opacity-90">Total Mahasiswa</div>
                    <div class="mt-1 text-3xl font-bold">{{ $totalMahasiswa ?? 0 }}</div>
                </div>
                <div class="rounded-xl p-6 bg-gradient-to-r from-green-500 to-green-600 text-white shadow">
                    <div class="text-sm opacity-90">KP Membimbing</div>
                    <div class="mt-1 text-3xl font-bold">{{ $kpMembimbingCount ?? 0 }}</div>
                </div>
                <div class="rounded-xl p-6 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white shadow">
                    <div class="text-sm opacity-90">Menunggu Approval</div>
                    <div class="mt-1 text-3xl font-bold">{{ $pendingApprovalsCount ?? 0 }}</div>
                </div>
                <div class="rounded-xl p-6 bg-gradient-to-r from-purple-500 to-purple-600 text-white shadow">
                    <div class="text-sm opacity-90">KP Selesai</div>
                    <div class="mt-1 text-3xl font-bold">{{ $completedKpCount ?? 0 }}</div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Validasi Judul/Proposal -->
                <div class="rounded-xl p-6 bg-white border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <div class="text-sm font-semibold text-gray-900">Validasi Judul/Proposal</div>
                            <p class="mt-1 text-sm text-gray-600">Review dan setujui proposal mahasiswa.</p>
                        </div>
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-blue-50 text-blue-600">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                        </span>
                    </div>
                    <div class="mt-4 flex items-center gap-3 text-sm">
                        <a href="{{ route('dosen.proposal.index') }}" class="text-blue-700 hover:underline">Lihat</a>
                    </div>
                </div>

                <!-- Riwayat Bimbingan -->
                <div class="rounded-xl p-6 bg-white border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <div class="text-sm font-semibold text-gray-900">Riwayat Bimbingan</div>
                            <p class="mt-1 text-sm text-gray-600">Catatan dan status pertemuan bimbingan.</p>
                        </div>
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-amber-50 text-amber-600">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M8 7V3h8v4"/><rect x="3" y="7" width="18" height="14" rx="2"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                        </span>
                    </div>
                    <div class="mt-4 flex items-center gap-3 text-sm">
                        <a href="{{ route('dosen.bimbingan.index') }}" class="text-amber-700 hover:underline">Lihat</a>
                    </div>
                </div>

                <!-- Input Nilai Pembimbing -->
                <div class="rounded-xl p-6 bg-white border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <div class="text-sm font-semibold text-gray-900">Input Nilai Pembimbing</div>
                            <p class="mt-1 text-sm text-gray-600">Penilaian KP dan seminar mahasiswa.</p>
                        </div>
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-indigo-50 text-indigo-600">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 20l9-5-9-5-9 5 9 5Z"/><path d="M12 12V4"/></svg>
                        </span>
                    </div>
                    <div class="mt-4 flex items-center gap-3 text-sm">
                        <a href="{{ route('dosen.nilai.index') }}" class="text-indigo-700 hover:underline">Lihat</a>
                        <span class="text-gray-300">|</span>
                        <a href="{{ route('dosen.nilai.create') }}" class="text-indigo-700 hover:underline">Tambah</a>
                    </div>
                </div>

                <!-- Menjadi Penguji Seminar -->
                <div class="rounded-xl p-6 bg-white border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <div class="text-sm font-semibold text-gray-900">Penguji Seminar</div>
                            <p class="mt-1 text-sm text-gray-600">Input penilaian dan catatan seminar.</p>
                        </div>
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-emerald-50 text-emerald-600">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 3v18"/><path d="M5 12h14"/></svg>
                        </span>
                    </div>
                    <div class="mt-4 flex items-center gap-3 text-sm">
                        <a href="{{ route('dosen.seminar.index') }}" class="text-emerald-700 hover:underline">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
