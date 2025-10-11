<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Header -->
            <header class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-900">Dashboard Mahasiswa</h2>
                <span class="text-gray-600">Selamat datang, {{ auth()->user()->nama }}!</span>
            </header>

            <!-- Statistik -->
            <div class="flex flex-wrap gap-6 justify-between">
                <div class="flex items-center bg-blue-500 text-white p-5 rounded-xl shadow-md space-x-4 flex-1 min-w-[200px]">
                    <div class="text-4xl">🎓</div>
                    <div>
                        <p class="text-3xl font-bold">{{ $kpAktifCount ?? 0 }}</p>
                        <p class="text-sm">KP Aktif</p>
                    </div>
                </div>
                <div class="flex items-center bg-green-500 text-white p-5 rounded-xl shadow-md space-x-4 flex-1 min-w-[200px]">
                    <div class="text-4xl">📝</div>
                    <div>
                        <p class="text-3xl font-bold">{{ $bimbinganCount ?? 0 }}</p>
                        <p class="text-sm">Sesi Bimbingan</p>
                    </div>
                </div>
                <div class="flex items-center bg-yellow-300 text-white p-5 rounded-xl shadow-md space-x-4 flex-1 min-w-[200px]">
                    <div class="text-4xl">📄</div>
                    <div>
                        <p class="text-3xl font-bold text-gray-900">{{ $laporanCount ?? 0 }}</p>
                        <p class="text-sm text-gray-900">Laporan Terunggah</p>
                    </div>
                </div>
                <div class="flex items-center bg-purple-500 text-white p-5 rounded-xl shadow-md space-x-4 flex-1 min-w-[200px]">
                    <div class="text-4xl">✅</div>
                    <div>
                        <p class="text-3xl font-bold">{{ $seminarCount ?? 0 }}</p>
                        <p class="text-sm">Seminar</p>
                    </div>
                </div>
            </div>

            <!-- Menu Akademik & KP -->
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                <!-- Menu KP -->
                <div class="bg-white rounded-xl shadow-md p-6 space-y-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center space-x-2">
                        <span>🗂️</span> <span>Menu Kerja Praktek</span>
                    </h3>
                    <a href="{{ route('kerja-praktek.create') }}" class="block p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition">
                        <p class="font-medium text-purple-700">Daftar KP Baru</p>
                        <p class="text-sm text-purple-600">Ajukan atau pilih instansi KP</p>
                    </a>
                    <a href="{{ route('kerja-praktek.index') }}" class="block p-4 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition">
                        <p class="font-medium text-yellow-700">Status & Perubahan</p>
                        <p class="text-sm text-yellow-600">Lihat atau ubah pengajuan KP</p>
                    </a>
                </div>
            </div>

            <!-- Informasi & Pengumuman -->
            <div class="bg-white rounded-xl shadow-md p-6 space-y-4">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center space-x-2">
                    <span>📢</span> <span>Informasi & Pengumuman</span>
                </h3>
                <div class="p-4 bg-blue-50 rounded-lg border border-blue-100">
                    <p class="font-semibold text-blue-700">Selamat datang di dashboard Mahasiswa!</p>
                    <p class="text-sm text-blue-600">Gunakan menu di atas untuk mengakses fitur KP dan bimbingan.</p>
                </div>
                <div class="p-4 bg-green-50 rounded-lg border border-green-100">
                    <p class="font-semibold text-green-700">Belum ada bimbingan aktif</p>
                    <p class="text-sm text-green-600">Sistem akan menampilkan bimbingan setelah ada pengajuan KP disetujui.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
