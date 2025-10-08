<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard Mahasiswa</h2>
            <div class="text-sm text-gray-600">Selamat datang, {{ auth()->user()->name }}!</div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Ringkasan -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="rounded-xl p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow">
                    <div class="text-sm opacity-90">KP Aktif</div>
                    <div class="mt-1 text-3xl font-bold">{{ $kpAktifCount ?? 0 }}</div>
                </div>
                <div class="rounded-xl p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow">
                    <div class="text-sm opacity-90">Sesi Bimbingan</div>
                    <div class="mt-1 text-3xl font-bold">{{ $bimbinganCount ?? 0 }}</div>
                </div>
                <div class="rounded-xl p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow">
                    <div class="text-sm opacity-90">Laporan Terunggah</div>
                    <div class="mt-1 text-3xl font-bold">{{ $laporanCount ?? 0 }}</div>
                </div>
                <div class="rounded-xl p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow">
                    <div class="text-sm opacity-90">Seminar</div>
                    <div class="mt-1 text-3xl font-bold">{{ $seminarCount ?? 0 }}</div>
                </div>
            </div>

            <!-- Menu fitur A–G (2x2 center) -->
            <div class="max-w-5xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <a href="{{ route('kerja-praktek.create') }}" class="group rounded-2xl p-5 bg-white border border-gray-200 shadow-sm hover:shadow-md transition">
                        <div class="font-semibold text-gray-900">Daftar KP Baru</div>
                        <div class="text-sm text-gray-600">Pilih instansi dari daftar atau ajukan baru</div>
                        <div class="mt-3 text-blue-600 text-sm group-hover:underline">Mulai pendaftaran →</div>
                    </a>
                    <a href="{{ route('kerja-praktek.index') }}" class="group rounded-2xl p-5 bg-white border border-gray-200 shadow-sm hover:shadow-md transition">
                        <div class="font-semibold text-gray-900">Status & Perubahan Pendaftaran</div>
                        <div class="text-sm text-gray-600">Lihat atau ubah pengajuan KP</div>
                        <div class="mt-3 text-blue-600 text-sm group-hover:underline">Buka daftar KP →</div>
                    </a>
                    <a href="{{ route('kerja-praktek.create') }}" class="group rounded-2xl p-5 bg-white border border-gray-200 shadow-sm hover:shadow-md transition">
                        <div class="font-semibold text-gray-900">Ajukan Judul & Proposal</div>
                        <div class="text-sm text-gray-600">Isi judul KP dan unggah proposal</div>
                        <div class="mt-3 text-blue-600 text-sm group-hover:underline">Ajukan proposal →</div>
                    </a>
                    <a href="{{ route('kerja-praktek.index') }}" class="group rounded-2xl p-5 bg-white border border-gray-200 shadow-sm hover:shadow-md transition">
                        <div class="font-semibold text-gray-900">Bimbingan & Laporan Akhir</div>
                        <div class="text-sm text-gray-600">Catat bimbingan dan unggah laporan/lembar pengesahan</div>
                        <div class="mt-3 text-blue-600 text-sm group-hover:underline">Kelola berkas KP →</div>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('mahasiswa.nilai') }}" class="block rounded-2xl p-6 bg-white border border-gray-200 shadow-sm hover:shadow-md transition">
                    <div class="font-semibold text-gray-900">Hasil KP</div>
                    <div class="text-sm text-gray-600">Lihat hasil penilaian setelah seminar</div>
                    <div class="mt-3 text-blue-600 text-sm">Lihat nilai →</div>
                </a>
                <a href="{{ route('mahasiswa.kuesioner.index') }}" class="block rounded-2xl p-6 bg-white border border-gray-200 shadow-sm hover:shadow-md transition">
                    <div class="font-semibold text-gray-900">Kuesioner KP</div>
                    <div class="text-sm text-gray-600">Isi/ubah survei kepuasan pelaksanaan KP</div>
                    <div class="mt-3 text-blue-600 text-sm">Buka kuesioner →</div>
                </a>
            </div>

            <div class="text-right">
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="text-sm text-gray-500 hover:text-red-600 hover:underline">Keluar dari sistem</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

