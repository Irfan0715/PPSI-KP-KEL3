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

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <a href="{{ route('kerja-praktek.index') }}" class="block rounded-xl p-6 bg-blue-50 text-blue-900 border border-blue-200 hover:bg-blue-100 transition">
                    <div class="font-semibold">Daftar KP</div>
                    <div class="text-sm opacity-80">Lihat dan kelola KP bimbingan</div>
                </a>
                <a href="{{ route('dosen.nilai.index') }}" class="block rounded-xl p-6 bg-indigo-50 text-indigo-900 border border-indigo-200 hover:bg-indigo-100 transition">
                    <div class="font-semibold">Nilai</div>
                    <div class="text-sm opacity-80">Input dan perbarui nilai mahasiswa</div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

