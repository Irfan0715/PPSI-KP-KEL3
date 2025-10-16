<x-app-layout>
    <div class="bg-gray-50 min-h-screen py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Header -->
            <header class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Dashboard Admin</h2>
                        <p class="mt-1 text-gray-500">Selamat datang, {{ auth()->user()->nama }}</p>
                    </div>
                </div>
            </header>

            @php
                $roles = collect($roleStats ?? []);
                $adminCount = optional($roles->firstWhere('slug', 'admin'))->users_count ?? 0;
                $dosenCount = optional($roles->firstWhere('slug', 'dosen'))->users_count ?? 0;
                $mhsCount = optional($roles->firstWhere('slug', 'mahasiswa'))->users_count ?? 0;
                $lapanganCount = optional($roles->firstWhere('slug', 'pembimbing_lapangan'))->users_count ?? 0;
            @endphp

            <!-- Statistik Role (dipindah ke bawah salam) -->
            <section>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <!-- Admin -->
                    <div class="rounded-2xl p-6 text-center shadow-sm ring-1 ring-blue-100 bg-blue-50">
                        <div class="text-2xl">👑</div>
                        <h4 class="mt-2 font-semibold text-blue-900">Admin</h4>
                        <p class="mt-1 text-2xl font-bold text-blue-900">{{ $adminCount }}</p>
                        <p class="text-xs text-blue-700">pengguna</p>
                    </div>
                    <!-- Dosen -->
                    <div class="rounded-2xl p-6 text-center shadow-sm ring-1 ring-emerald-100 bg-emerald-50">
                        <div class="text-2xl">👨‍🏫</div>
                        <h4 class="mt-2 font-semibold text-emerald-900">Dosen</h4>
                        <p class="mt-1 text-2xl font-bold text-emerald-900">{{ $dosenCount }}</p>
                        <p class="text-xs text-emerald-700">pengguna</p>
                    </div>
                    <!-- Mahasiswa -->
                    <div class="rounded-2xl p-6 text-center shadow-sm ring-1 ring-violet-100 bg-violet-50">
                        <div class="text-2xl">🎓</div>
                        <h4 class="mt-2 font-semibold text-violet-900">Mahasiswa</h4>
                        <p class="mt-1 text-2xl font-bold text-violet-900">{{ $mhsCount }}</p>
                        <p class="text-xs text-violet-700">pengguna</p>
                    </div>
                    <!-- Pengawas Lapangan -->
                    <div class="rounded-2xl p-6 text-center shadow-sm ring-1 ring-amber-100 bg-amber-50">
                        <div class="text-2xl">🧑‍💼</div>
                        <h4 class="mt-2 font-semibold text-amber-900">Pengawas Lapangan</h4>
                        <p class="mt-1 text-2xl font-bold text-amber-900">{{ $lapanganCount }}</p>
                        <p class="text-xs text-amber-700">pengguna</p>
                    </div>
                </div>
            </section>

            <!-- Menu (2 kolom) -->
            <section class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <h3 class="mb-4 text-base font-semibold text-gray-900">Menu Administrasi</h3>
                    <div class="space-y-3">
                        <a href="{{ route('admin.users') }}" class="flex items-start justify-between rounded-xl border border-gray-100 bg-blue-50/60 p-4 hover:bg-blue-50 transition">
                            <div class="flex items-start gap-3">
                                <span class="text-xl">👥</span>
                                <div>
                                    <p class="font-medium text-gray-900">Kelola Pengguna</p>
                                    <p class="text-sm text-gray-600">Tambah, edit, dan hapus pengguna</p>
                                </div>
                            </div>
                            <span class="text-blue-600">→</span>
                        </a>
                        <a href="{{ route('admin.monitoring') }}" class="flex items-start justify-between rounded-xl border border-gray-100 bg-emerald-50/60 p-4 hover:bg-emerald-50 transition">
                            <div class="flex items-start gap-3">
                                <span class="text-xl">📊</span>
                                <div>
                                    <p class="font-medium text-gray-900">Monitor KP</p>
                                    <p class="text-sm text-gray-600">Pantau progres dan ringkasan KP</p>
                                </div>
                            </div>
                            <span class="text-emerald-600">→</span>
                        </a>
                    </div>
                </div>
                <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <h3 class="mb-4 text-base font-semibold text-gray-900">Menu Data</h3>
                    <div class="space-y-3">
                        <a href="{{ route('admin.instansi.index') }}" class="flex items-start justify-between rounded-xl border border-gray-100 bg-purple-50/60 p-4 hover:bg-purple-50 transition">
                            <div class="flex items-start gap-3">
                                <span class="text-xl">🏢</span>
                                <div>
                                    <p class="font-medium text-gray-900">Instansi</p>
                                    <p class="text-sm text-gray-600">Kelola data instansi KP</p>
                                </div>
                            </div>
                            <span class="text-purple-600">→</span>
                        </a>
                        <a href="{{ route('admin.lowongan.index') }}" class="flex items-start justify-between rounded-xl border border-gray-100 bg-amber-50/60 p-4 hover:bg-amber-50 transition">
                            <div class="flex items-start gap-3">
                                <span class="text-xl">🧾</span>
                                <div>
                                    <p class="font-medium text-gray-900">Lowongan KP</p>
                                    <p class="text-sm text-gray-600">Kelola lowongan dan kuota</p>
                                </div>
                            </div>
                            <span class="text-amber-600">→</span>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Statistik Role Detail dipindah ke atas; bagian ini dihapus -->

            <!-- Informasi & Pengumuman -->
            <section class="space-y-4">
                <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-600">Informasi & Pengumuman</h3>
                <div class="rounded-2xl border border-blue-100 bg-blue-50 p-5 text-blue-800 shadow-sm">
                    <div class="flex items-start gap-3">
                        <div class="text-xl">📣</div>
                        <div>
                            <p class="font-semibold">Selamat datang di dashboard Admin!</p>
                            <p class="text-sm">Anda memiliki akses penuh untuk mengelola sistem KP. Pastikan semua pengguna memiliki role yang sesuai.</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-2xl border border-amber-100 bg-amber-50 p-5 text-amber-800 shadow-sm">
                    <div class="flex items-start gap-3">
                        <div class="text-xl">💡</div>
                        <div>
                            <p class="font-semibold">Tips Pengelolaan Sistem</p>
                            <ul class="mt-1 list-disc pl-5 text-sm">
                                <li>Pastikan setiap pengguna memiliki role yang tepat.</li>
                                <li>Monitor aktivitas KP secara berkala melalui menu Monitoring.</li>
                                <li>Update data instansi dan lowongan secara rutin.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</x-app-layout>
