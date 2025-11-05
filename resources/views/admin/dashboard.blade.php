<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Dashboard Admin</h2>
                <p class="mt-1 text-sm text-gray-500">Kelola fitur sistem kerja praktek secara terpusat.</p>
            </div>
        </div>
    </x-slot>

    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

            <!-- ================= MENU SECTIONS ================= -->
            <section aria-labelledby="menu-heading">
                <h3 id="menu-heading" class="sr-only">Menu</h3>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    <!-- ========== MENU ADMIN ========== -->
                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                        <div class="mb-4">
                            <h4 class="text-lg font-semibold text-gray-900">Menu Admin</h4>
                        </div>

                        <ul class="space-y-3">
                            <!-- Manajemen Users -->
                            <li>
                                <a href="{{ route('admin.users') }}"
                                   class="group block rounded-xl border border-gray-200 p-4 transition
                                          hover:border-blue-300 hover:bg-blue-50/60
                                          focus:outline-none focus-visible:ring focus-visible:ring-blue-400">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="font-medium text-gray-900 group-hover:text-blue-700">
                                                Manajemen Users
                                            </p>
                                            <p class="text-sm text-gray-500">Kelola pengguna sistem</p>
                                        </div>
                                        <div class="mt-1 text-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-5 w-5" fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <!-- Manajemen Instansi -->
                            <li>
                                <a href="{{ route('admin.instansi.index') }}"
                                   class="group block rounded-xl border border-gray-200 p-4 transition
                                          hover:border-emerald-300 hover:bg-emerald-50/60
                                          focus:outline-none focus-visible:ring focus-visible:ring-emerald-400">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="font-medium text-gray-900 group-hover:text-emerald-700">
                                                Manajemen Instansi
                                            </p>
                                            <p class="text-sm text-gray-500">Kelola instansi kerja praktek</p>
                                        </div>
                                        <div class="mt-1 text-emerald-600">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-5 w-5" fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <!-- Manajemen Lowongan KP -->
                            <li>
                                <a href="{{ route('admin.lowongan.index') }}"
                                   class="group block rounded-xl border border-gray-200 p-4 transition
                                          hover:border-amber-300 hover:bg-amber-50/60
                                          focus:outline-none focus-visible:ring focus-visible:ring-amber-400">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="font-medium text-gray-900 group-hover:text-amber-700">
                                                Manajemen Lowongan KP
                                            </p>
                                            <p class="text-sm text-gray-500">Kelola lowongan kerja praktek</p>
                                        </div>
                                        <div class="mt-1 text-amber-600">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-5 w-5" fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <!-- Alokasi Dosen -->
                            <li>
                                <a href="{{ route('admin.alokasi.pembimbing') }}"
                                   class="group block rounded-xl border border-gray-200 p-4 transition
                                          hover:border-pink-300 hover:bg-pink-50/60
                                          focus:outline-none focus-visible:ring focus-visible:ring-pink-400">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="font-medium text-gray-900 group-hover:text-pink-700">
                                                Alokasi Dosen Pembimbing & Penguji
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                Atur alokasi dosen pembimbing dan penguji
                                            </p>
                                        </div>
                                        <div class="mt-1 text-pink-600">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-5 w-5" fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- ========== MONITORING & LAPORAN ========== -->
                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                        <div class="mb-4">
                            <h4 class="text-lg font-semibold text-gray-900">Monitoring & Laporan</h4>
                        </div>

                        <ul class="space-y-3">
                            <!-- Monitoring KP -->
                            <li>
                                <a href="{{ route('admin.monitoring') }}"
                                   class="group block rounded-xl border border-gray-200 p-4 transition
                                          hover:border-purple-300 hover:bg-purple-50/60
                                          focus:outline-none focus-visible:ring focus-visible:ring-purple-400">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="font-medium text-gray-900 group-hover:text-purple-700">
                                                Monitoring KP
                                            </p>
                                            <p class="text-sm text-gray-500">Pantau progress kerja praktek</p>
                                        </div>
                                        <div class="mt-1 text-purple-600">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-5 w-5" fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <!-- Manajemen Kuota -->
                            <li>
                                <a href="{{ route('admin.kuota.index') }}"
                                   class="group block rounded-xl border border-gray-200 p-4 transition
                                          hover:border-indigo-300 hover:bg-indigo-50/60
                                          focus:outline-none focus-visible:ring focus-visible:ring-indigo-400">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="font-medium text-gray-900 group-hover:text-indigo-700">
                                                Manajemen Kuota
                                            </p>
                                            <p class="text-sm text-gray-500">Kelola kuota kerja praktek</p>
                                        </div>
                                        <div class="mt-1 text-indigo-600">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-5 w-5" fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- ========== STATISTIK & RINGKASAN ========== -->
                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm md:col-span-2 lg:col-span-1">
                        <div class="mb-4">
                            <h4 class="text-lg font-semibold text-gray-900">Statistik & Ringkasan</h4>
                        </div>

                        <div class="space-y-4">
                            <!-- Total Users -->
                            <div class="flex items-center justify-between p-4 rounded-xl bg-blue-50 border border-blue-200">
                                <div>
                                    <p class="text-sm font-medium text-blue-900">Total Users</p>
                                    <p class="text-2xl font-bold text-blue-700">{{ \App\Models\User::count() }}</p>
                                </div>
                                <div class="text-blue-600">
                                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Total Instansi -->
                            <div class="flex items-center justify-between p-4 rounded-xl bg-emerald-50 border border-emerald-200">
                                <div>
                                    <p class="text-sm font-medium text-emerald-900">Total Instansi</p>
                                    <p class="text-2xl font-bold text-emerald-700">{{ \App\Models\Instansi::count() }}</p>
                                </div>
                                <div class="text-emerald-600">
                                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Total KP Aktif -->
                            <div class="flex items-center justify-between p-4 rounded-xl bg-amber-50 border border-amber-200">
                                <div>
                                    <p class="text-sm font-medium text-amber-900">KP Aktif</p>
                                    <p class="text-2xl font-bold text-amber-700">{{ \App\Models\KerjaPraktek::where('status', 'aktif')->count() }}</p>
                                </div>
                                <div class="text-amber-600">
                                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= INFORMASI & PENGUMUMAN ================= -->
            <section aria-labelledby="info-heading">
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                    <div class="mb-4">
                        <h4 id="info-heading" class="text-lg font-semibold text-gray-900">
                            Informasi & Pengumuman
                        </h4>
                    </div>

                    <div class="space-y-4">
                        <div class="rounded-xl border border-blue-200 bg-blue-50 p-4">
                            <p class="font-medium text-blue-900">Selamat datang di Dashboard Admin!</p>
                            <p class="text-sm text-blue-800">
                                Gunakan menu di atas untuk mengakses fitur-fitur sistem kerja praktek.
                            </p>
                        </div>

                        <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-4">
                            <p class="font-medium text-emerald-900">Pastikan data selalu diperbarui.</p>
                            <p class="text-sm text-emerald-800">
                                Periksa dan kelola data instansi, lowongan, dan kuota secara berkala.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</x-app-layout>

