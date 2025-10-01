<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Admin') }}
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
                            <h3 class="text-3xl font-bold">{{ $totalUsers }}</h3>
                            <p class="text-blue-100">Total Pengguna</p>
                        </div>
                        <div class="text-4xl">👥</div>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-3xl font-bold">{{ $totalRoles }}</h3>
                            <p class="text-green-100">Total Role</p>
                        </div>
                        <div class="text-4xl">🏷️</div>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-3xl font-bold">{{ $roleStats->where('slug', 'dosen-biasa')->first()->users_count ?? 0 }}</h3>
                            <p class="text-yellow-100">Dosen Biasa</p>
                        </div>
                        <div class="text-4xl">👨‍🏫</div>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-3xl font-bold">{{ $roleStats->where('slug', 'mahasiswa')->first()->users_count ?? 0 }}</h3>
                            <p class="text-purple-100">Mahasiswa</p>
                        </div>
                        <div class="text-4xl">👨‍🎓</div>
                    </div>
                </div>
            </div>

            <!-- Menu Aksi -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">⚙️ Menu Administrasi</h3>
                    <div class="space-y-3">
                        <a href="{{ route('admin.users') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 text-blue-800 rounded-lg transition-colors">
                            <span class="text-xl mr-3">👥</span>
                            <div>
                                <div class="font-medium">Kelola Pengguna</div>
                                <div class="text-sm text-blue-600">Tambah, edit, dan hapus pengguna</div>
                            </div>
                        </a>
                        <a href="{{ route('kerja-praktek.index') }}" class="flex items-center p-3 bg-green-50 hover:bg-green-100 text-green-800 rounded-lg transition-colors">
                            <span class="text-xl mr-3">📋</span>
                            <div>
                                <div class="font-medium">Monitor KP</div>
                                <div class="text-sm text-green-600">Pantau semua pendaftaran KP</div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">📊 Menu Laporan</h3>
                    <div class="space-y-3">
                        <a href="#" class="flex items-center p-3 bg-purple-50 hover:bg-purple-100 text-purple-800 rounded-lg transition-colors">
                            <span class="text-xl mr-3">📈</span>
                            <div>
                                <div class="font-medium">Laporan Sistem</div>
                                <div class="text-sm text-purple-600">Statistik dan analisis data</div>
                            </div>
                        </a>
                        <a href="#" class="flex items-center p-3 bg-yellow-50 hover:bg-yellow-100 text-yellow-800 rounded-lg transition-colors">
                            <span class="text-xl mr-3">⚙️</span>
                            <div>
                                <div class="font-medium">Pengaturan Sistem</div>
                                <div class="text-sm text-yellow-600">Konfigurasi aplikasi</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Statistik Role Detail -->
            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm mb-8">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">📊 Statistik Role Detail</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach($roleStats as $role)
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-center">
                        <div class="text-2xl mb-2">
                            @if($role->slug === 'admin') 👑
                            @elseif($role->slug === 'dosen-biasa') 👨‍🏫
                            @elseif($role->slug === 'mahasiswa') 👨‍🎓
                            @elseif($role->slug === 'pengawas-lapangan') 👮‍♂️
                            @else 🏷️
                            @endif
                        </div>
                        <h4 class="font-semibold text-gray-800">{{ $role->name }}</h4>
                        <p class="text-2xl font-bold text-blue-600 mt-1">{{ $role->users_count }}</p>
                        <p class="text-sm text-gray-600">pengguna</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Informasi & Pengumuman -->
            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">📢 Informasi & Pengumuman</h3>
                <div class="space-y-4">
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <span class="text-2xl mr-3">👋</span>
                            <div>
                                <p class="text-blue-800 font-medium">Selamat datang di dashboard Admin!</p>
                                <p class="text-blue-600 text-sm mt-1">Anda memiliki akses penuh untuk mengelola sistem KP.</p>
                                <p class="text-blue-600 text-sm">Pastikan semua pengguna memiliki role yang sesuai dengan tugasnya.</p>
                            </div>
                        </div>
                    </div>

                    @if($totalUsers == 0)
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <span class="text-2xl mr-3">⚠️</span>
                            <div>
                                <p class="text-yellow-800 font-medium">Sistem belum memiliki pengguna!</p>
                                <p class="text-yellow-700 text-sm">Silakan tambahkan pengguna dengan role yang sesuai untuk memulai menggunakan sistem.</p>
                                <a href="{{ route('admin.users') }}" class="text-yellow-800 font-medium text-sm hover:underline">Tambah pengguna sekarang →</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <span class="text-2xl mr-3">💡</span>
                            <div>
                                <p class="text-green-800 font-medium">Tips Pengelolaan Sistem</p>
                                <ul class="text-green-700 text-sm mt-1 space-y-1">
                                    <li>• Pastikan setiap pengguna memiliki role yang tepat</li>
                                    <li>• Monitor aktivitas KP secara berkala</li>
                                    <li>• Backup data sistem secara rutin</li>
                                    <li>• Update informasi kontak dosen dan mahasiswa</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
