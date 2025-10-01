<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Mahasiswa') }}
            </h2>
            <div class="text-sm text-gray-600">
                Selamat datang, {{ auth()->user()->name }}!
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistik Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-3xl font-bold">{{ $kpAktifCount }}</h3>
                            <p class="text-blue-100">KP Aktif</p>
                        </div>
                        <div class="text-4xl">📝</div>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-3xl font-bold">{{ $bimbinganCount }}</h3>
                            <p class="text-green-100">Sesi Bimbingan</p>
                        </div>
                        <div class="text-4xl">👨‍🏫</div>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-3xl font-bold">{{ $laporanCount }}</h3>
                            <p class="text-yellow-100">Laporan Upload</p>
                        </div>
                        <div class="text-4xl">📄</div>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-3xl font-bold">{{ $seminarCount }}</h3>
                            <p class="text-purple-100">Seminar</p>
                        </div>
                        <div class="text-4xl">🎓</div>
                    </div>
                </div>
            </div>

            <!-- Menu Aksi -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">🎯 Menu Kerja Praktek</h3>
                    <div class="space-y-3">
                        <a href="{{ route('kerja-praktek.create') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 text-blue-800 rounded-lg transition-colors">
                            <span class="text-xl mr-3">📝</span>
                            <div>
                                <div class="font-medium">Daftar KP Baru</div>
                                <div class="text-sm text-blue-600">Mulai pendaftaran kerja praktek</div>
                            </div>
                        </a>
                        <a href="{{ route('kerja-praktek.index') }}" class="flex items-center p-3 bg-green-50 hover:bg-green-100 text-green-800 rounded-lg transition-colors">
                            <span class="text-xl mr-3">📋</span>
                            <div>
                                <div class="font-medium">Lihat Pendaftaran KP</div>
                                <div class="text-sm text-green-600">Cek status dan progress KP</div>
                            </div>
                        </a>
                        <a href="{{ route('mahasiswa.profil') }}" class="flex items-center p-3 bg-yellow-50 hover:bg-yellow-100 text-yellow-800 rounded-lg transition-colors">
                            <span class="text-xl mr-3">👤</span>
                            <div>
                                <div class="font-medium">Profil & IPK</div>
                                <div class="text-sm text-yellow-600">Kelola data pribadi</div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">📚 Menu Akademik</h3>
                    <div class="space-y-3">
                        <a href="{{ route('mahasiswa.nilai') }}" class="flex items-center p-3 bg-indigo-50 hover:bg-indigo-100 text-indigo-800 rounded-lg transition-colors">
                            <span class="text-xl mr-3">📊</span>
                            <div>
                                <div class="font-medium">Nilai Akademik</div>
                                <div class="text-sm text-indigo-600">Lihat transkrip nilai</div>
                            </div>
                        </a>
                        <a href="{{ route('mahasiswa.jadwal-kuliah') }}" class="flex items-center p-3 bg-purple-50 hover:bg-purple-100 text-purple-800 rounded-lg transition-colors">
                            <span class="text-xl mr-3">📅</span>
                            <div>
                                <div class="font-medium">Jadwal Kuliah</div>
                                <div class="text-sm text-purple-600">Lihat jadwal perkuliahan</div>
                            </div>
                        </a>
                        <a href="{{ route('mahasiswa.tugas') }}" class="flex items-center p-3 bg-pink-50 hover:bg-pink-100 text-pink-800 rounded-lg transition-colors">
                            <span class="text-xl mr-3">📝</span>
                            <div>
                                <div class="font-medium">Tugas & Assignment</div>
                                <div class="text-sm text-pink-600">Kelola tugas kuliah</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Status Terkini -->
            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm mb-8">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">📢 Status Terkini</h3>
                <div class="space-y-3">
                    @if($kpAktifCount > 0)
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">✅</span>
                                <div>
                                    <p class="text-green-800 font-medium">Anda memiliki {{ $kpAktifCount }} KP aktif</p>
                                    <p class="text-green-600 text-sm">Status: {{ $latestKpStatus ?? 'Aktif' }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">📝</span>
                                <div>
                                    <p class="text-yellow-800 font-medium">Belum ada pendaftaran KP</p>
                                    <p class="text-yellow-600 text-sm">Silakan daftar KP untuk memulai</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Progress KP -->
            @if($kpAktifCount > 0)
            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">📈 Progress Kerja Praktek</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <div class="text-3xl mb-2">{{ $progressSteps['proposal'] ?? '❌' }}</div>
                        <p class="font-medium text-gray-800">Proposal</p>
                        <p class="text-sm text-gray-600">{{ $progressSteps['proposal'] === '✅' ? 'Selesai' : 'Belum selesai' }}</p>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <div class="text-3xl mb-2">{{ $progressSteps['bimbingan'] ?? '❌' }}</div>
                        <p class="font-medium text-gray-800">Bimbingan</p>
                        <p class="text-sm text-gray-600">{{ $progressSteps['bimbingan'] === '✅' ? 'Selesai' : 'Belum selesai' }}</p>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <div class="text-3xl mb-2">{{ $progressSteps['seminar'] ?? '❌' }}</div>
                        <p class="font-medium text-gray-800">Seminar</p>
                        <p class="text-sm text-gray-600">{{ $progressSteps['seminar'] === '✅' ? 'Selesai' : 'Belum selesai' }}</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
