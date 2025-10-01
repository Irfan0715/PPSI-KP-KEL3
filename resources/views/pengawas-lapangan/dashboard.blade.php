<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Pengawas Lapangan') }}
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
                            <h3 class="text-3xl font-bold">{{ $mahasiswaDibimbingCount }}</h3>
                            <p class="text-blue-100">Mahasiswa Dibimbing</p>
                        </div>
                        <div class="text-4xl">👨‍🎓</div>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-3xl font-bold">{{ $laporanMasukCount }}</h3>
                            <p class="text-green-100">Laporan Masuk</p>
                        </div>
                        <div class="text-4xl">📄</div>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-3xl font-bold">{{ $jadwalPengawasanCount }}</h3>
                            <p class="text-yellow-100">Jadwal Pengawasan</p>
                        </div>
                        <div class="text-4xl">📅</div>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-3xl font-bold">{{ $evaluasiSelesaiCount }}</h3>
                            <p class="text-purple-100">Evaluasi Selesai</p>
                        </div>
                        <div class="text-4xl">✅</div>
                    </div>
                </div>
            </div>

            <!-- Menu Aksi -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">👮‍♂️ Menu Pengawasan</h3>
                    <div class="space-y-3">
                        <a href="{{ route('pengawas-lapangan.laporan') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 text-blue-800 rounded-lg transition-colors">
                            <span class="text-xl mr-3">📋</span>
                            <div>
                                <div class="font-medium">Laporan KP</div>
                                <div class="text-sm text-blue-600">Review laporan mahasiswa</div>
                            </div>
                        </a>
                        <a href="{{ route('pengawas-lapangan.jadwal-pengawasan') }}" class="flex items-center p-3 bg-green-50 hover:bg-green-100 text-green-800 rounded-lg transition-colors">
                            <span class="text-xl mr-3">📅</span>
                            <div>
                                <div class="font-medium">Jadwal Pengawasan</div>
                                <div class="text-sm text-green-600">Atur jadwal kunjungan</div>
                            </div>
                        </a>
                        <a href="{{ route('pengawas-lapangan.evaluasi') }}" class="flex items-center p-3 bg-yellow-50 hover:bg-yellow-100 text-yellow-800 rounded-lg transition-colors">
                            <span class="text-xl mr-3">📝</span>
                            <div>
                                <div class="font-medium">Evaluasi</div>
                                <div class="text-sm text-yellow-600">Evaluasi mahasiswa KP</div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">📊 Menu Monitoring</h3>
                    <div class="space-y-3">
                        <a href="{{ route('kerja-praktek.index') }}" class="flex items-center p-3 bg-purple-50 hover:bg-purple-100 text-purple-800 rounded-lg transition-colors">
                            <span class="text-xl mr-3">📋</span>
                            <div>
                                <div class="font-medium">Daftar KP</div>
                                <div class="text-sm text-purple-600">Lihat semua pendaftaran KP</div>
                            </div>
                        </a>
                        <a href="#" class="flex items-center p-3 bg-indigo-50 hover:bg-indigo-100 text-indigo-800 rounded-lg transition-colors">
                            <span class="text-xl mr-3">📈</span>
                            <div>
                                <div class="font-medium">Laporan Aktivitas</div>
                                <div class="text-sm text-indigo-600">Laporan kegiatan pengawasan</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mahasiswa Dibimbing -->
            @if($mahasiswaDibimbingCount > 0)
            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm mb-8">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">👨‍🎓 Mahasiswa Dibimbing</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($recentMahasiswaDibimbing ?? [] as $kp)
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-semibold text-gray-800">{{ $kp->mahasiswa->name ?? 'N/A' }}</h4>
                            <span class="inline-block bg-{{ $kp->status === 'berlangsung' ? 'green' : ($kp->status === 'disetujui' ? 'blue' : 'yellow') }}-100 text-{{ $kp->status === 'berlangsung' ? 'green' : ($kp->status === 'disetujui' ? 'blue' : 'yellow') }}-800 px-2 py-1 rounded-full text-xs">
                                {{ ucfirst($kp->status ?? 'draft') }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">{{ $kp->instansi->nama_instansi ?? 'Instansi tidak ditemukan' }}</p>
                        <p class="text-xs text-gray-500 mb-2">{{ $kp->judul_kp ?? 'Judul belum diset' }}</p>
                        <div class="flex justify-between items-center text-xs text-gray-500">
                            <span>📅 {{ $kp->created_at->format('d/m/Y') }}</span>
                            <a href="{{ route('kerja-praktek.show', $kp->id) }}" class="text-blue-600 hover:text-blue-800">Lihat Detail →</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Jadwal Hari Ini -->
            @if($jadwalPengawasanCount > 0)
            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm mb-8">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">📅 Jadwal Hari Ini</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($todaySchedules ?? [] as $schedule)
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-semibold text-yellow-800">{{ $schedule->mahasiswa->name ?? 'N/A' }}</h4>
                            <span class="text-xs bg-yellow-200 text-yellow-800 px-2 py-1 rounded-full">Hari Ini</span>
                        </div>
                        <p class="text-sm text-yellow-700 mb-2">{{ $schedule->instansi->nama_instansi ?? 'Instansi tidak ditemukan' }}</p>
                        <p class="text-xs text-yellow-600">{{ $schedule->judul_kp ?? 'Judul belum diset' }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Informasi & Pengumuman -->
            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">📢 Informasi & Pengumuman</h3>
                <div class="space-y-4">
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <span class="text-2xl mr-3">👋</span>
                            <div>
                                <p class="text-blue-800 font-medium">Selamat datang di dashboard Pengawas Lapangan!</p>
                                <p class="text-blue-600 text-sm mt-1">Anda bertugas melakukan pengawasan dan evaluasi mahasiswa KP di lapangan.</p>
                                <p class="text-blue-600 text-sm">Pastikan mahasiswa mengikuti prosedur KP dengan baik.</p>
                            </div>
                        </div>
                    </div>

                    @if($mahasiswaDibimbingCount == 0)
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <span class="text-2xl mr-3">📝</span>
                            <div>
                                <p class="text-green-800 font-medium">Belum ada mahasiswa yang dibimbing</p>
                                <p class="text-green-600 text-sm">Sistem akan menampilkan mahasiswa yang Anda bimbing setelah ada pendaftaran KP yang disetujui dengan Anda sebagai pengawas.</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($laporanMasukCount > 0)
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <span class="text-2xl mr-3">⚠️</span>
                            <div>
                                <p class="text-yellow-800 font-medium">Pemberitahuan Penting!</p>
                                <p class="text-yellow-700 text-sm">Terdapat {{ $laporanMasukCount }} laporan KP yang perlu direview.</p>
                                <a href="{{ route('pengawas-lapangan.laporan') }}" class="text-yellow-800 font-medium text-sm hover:underline">Review sekarang →</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <span class="text-2xl mr-3">💡</span>
                            <div>
                                <p class="text-purple-800 font-medium">Tips Pengawasan Lapangan</p>
                                <ul class="text-purple-700 text-sm mt-1 space-y-1">
                                    <li>• Lakukan kunjungan rutin ke lokasi KP mahasiswa</li>
                                    <li>• Berikan evaluasi yang konstruktif dan objektif</li>
                                    <li>• Pastikan mahasiswa mengikuti aturan keselamatan kerja</li>
                                    <li>• Dokumentasikan setiap kegiatan pengawasan</li>
                                    <li>• Berikan feedback yang membantu mahasiswa berkembang</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
