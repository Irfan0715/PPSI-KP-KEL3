<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-800">Sistem KP</h1>
            </div>
            <nav class="mt-6">
                <a href="{{ route('pembimbing-lapangan.dashboard') }}" class="block py-3 px-6 text-gray-700 hover:bg-gray-200 font-semibold">Dashboard</a>
                <a href="{{ route('pembimbing-lapangan.laporan') }}" class="block py-3 px-6 text-gray-700 hover:bg-gray-200">Laporan KP</a>
                <a href="{{ route('pembimbing-lapangan.jadwal-pengawasan') }}" class="block py-3 px-6 text-gray-700 hover:bg-gray-200">Jadwal Pengawasan</a>
                <a href="{{ route('pembimbing-lapangan.evaluasi') }}" class="block py-3 px-6 text-gray-700 hover:bg-gray-200">Evaluasi</a>
            </nav>
        </aside>

        <!-- Main content -->
        <main class="flex-1 p-8 overflow-y-auto">
            <header class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-semibold text-gray-900">Dashboard Pengawas Lapangan</h2>
                <div class="text-gray-700">Selamat datang, {{ auth()->user()->nama }}!</div>
            </header>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg p-6 shadow flex items-center space-x-4">
                    <div class="text-4xl">👨‍🎓</div>
                    <div>
                        <p class="text-2xl font-bold">{{ $mahasiswaDibimbingCount ?? 0 }}</p>
                        <p>Mahasiswa Dibimbing</p>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg p-6 shadow flex items-center space-x-4">
                    <div class="text-4xl">📄</div>
                    <div>
                        <p class="text-2xl font-bold">{{ $laporanMasukCount ?? 0 }}</p>
                        <p>Laporan Masuk</p>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white rounded-lg p-6 shadow flex items-center space-x-4">
                    <div class="text-4xl">📅</div>
                    <div>
                        <p class="text-2xl font-bold">{{ $jadwalPengawasanCount ?? 0 }}</p>
                        <p>Jadwal Pengawasan</p>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-lg p-6 shadow flex items-center space-x-4">
                    <div class="text-4xl">✅</div>
                    <div>
                        <p class="text-2xl font-bold">{{ $evaluasiSelesaiCount ?? 0 }}</p>
                        <p>Evaluasi Selesai</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('pembimbing-lapangan.laporan') }}" class="block bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold mb-2">Laporan KP</h3>
                    <p class="text-gray-600">Review laporan mahasiswa</p>
                </a>
                <a href="{{ route('pembimbing-lapangan.jadwal-pengawasan') }}" class="block bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold mb-2">Jadwal Pengawasan</h3>
                    <p class="text-gray-600">Atur jadwal kunjungan</p>
                </a>
                <a href="{{ route('pembimbing-lapangan.evaluasi') }}" class="block bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold mb-2">Evaluasi</h3>
                    <p class="text-gray-600">Evaluasi mahasiswa KP</p>
                </a>
            </section>
        </main>
    </div>
</x-app-layout>
