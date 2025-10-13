<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-8 space-y-10">

            <!-- Header -->
            <header class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Dashboard Admin</h1>
                    <p class="text-sm text-gray-500 mt-1">Selamat datang,
                        <span class="font-semibold text-gray-800">{{ auth()->user()->name ?? auth()->user()->nama }}</span>
                    </p>
                </div>

                <a href="{{ route('admin.users') }}"
                   class="inline-flex items-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 hover:border-blue-300 transition-all duration-200">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                    Kelola Pengguna
                </a>
            </header>

            <!-- Statistik Section -->
            <section>
                <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">Statistik Sistem</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                    <!-- Total Users -->
                    <div class="group bg-white border border-gray-100 rounded-2xl p-5 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                        <div class="flex items-center gap-4">
                            <span class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                     viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </span>
                            <div>
                                <p class="text-xs text-gray-500 uppercase">Total Users</p>
                                <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $totalUsers ?? 0 }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Instansi -->
                    <div class="group bg-white border border-gray-100 rounded-2xl p-5 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                        <div class="flex items-center gap-4">
                            <span class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                     viewBox="0 0 24 24"><path d="M3 11l9-9 9 9"/><path d="M9 22V12h6v10"/></svg>
                            </span>
                            <div>
                                <p class="text-xs text-gray-500 uppercase">Total Instansi</p>
                                <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $totalInstansi ?? 0 }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Lowongan -->
                    <div class="group bg-white border border-gray-100 rounded-2xl p-5 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                        <div class="flex items-center gap-4">
                            <span class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                     viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M7 10l5-5 5 5"/></svg>
                            </span>
                            <div>
                                <p class="text-xs text-gray-500 uppercase">Total Lowongan KP</p>
                                <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $totalLowongan ?? 0 }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Kuota -->
                    <div class="group bg-white border border-gray-100 rounded-2xl p-5 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                        <div class="flex items-center gap-4">
                            <span class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                     viewBox="0 0 24 24"><path d="M21 15a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4"/><path d="M7 10a5 5 0 0 1 10 0"/></svg>
                            </span>
                            <div>
                                <p class="text-xs text-gray-500 uppercase">Total Kuota</p>
                                <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $totalKuota ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Manajemen Section -->
            <section>
                <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">Manajemen</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Manajemen Users -->
                    <a href="{{ route('admin.users') }}"
                       class="group block rounded-2xl bg-white border border-gray-100 p-6 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                        <div class="flex items-start gap-4">
                            <span class="inline-flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                     viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </span>
                            <div>
                                <h4 class="text-base font-semibold text-gray-900">Manajemen Users</h4>
                                <p class="mt-1 text-sm text-gray-500">Kelola akun, peran, dan akses pengguna.</p>
                                <span class="mt-3 inline-flex items-center text-sm font-medium text-blue-700 group-hover:underline">
                                    Buka <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
                                </span>
                            </div>
                        </div>
                    </a>

                    <!-- Manajemen Instansi -->
                    <a href="{{ route('admin.instansi.index') }}"
                       class="group block rounded-2xl bg-white border border-gray-100 p-6 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                        <div class="flex items-start gap-4">
                            <span class="inline-flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                     viewBox="0 0 24 24"><path d="M3 11l9-9 9 9"/><path d="M9 22V12h6v10"/></svg>
                            </span>
                            <div>
                                <h4 class="text-base font-semibold text-gray-900">Manajemen Instansi</h4>
                                <p class="mt-1 text-sm text-gray-500">Atur data perusahaan/instansi dan verifikasinya.</p>
                                <span class="mt-3 inline-flex items-center text-sm font-medium text-emerald-700 group-hover:underline">
                                    Buka <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
                                </span>
                            </div>
                        </div>
                    </a>

                    <!-- Manajemen Lowongan -->
                    <a href="{{ route('admin.lowongan.index') }}"
                       class="group block rounded-2xl bg-white border border-gray-100 p-6 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
                        <div class="flex items-start gap-4">
                            <span class="inline-flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                     viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M7 10l5-5 5 5"/></svg>
                            </span>
                            <div>
                                <h4 class="text-base font-semibold text-gray-900">Manajemen Lowongan KP</h4>
                                <p class="mt-1 text-sm text-gray-500">Kelola lowongan KP dan kuota penerimaan.</p>
                                <span class="mt-3 inline-flex items-center text-sm font-medium text-amber-700 group-hover:underline">
                                    Buka <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
                                </span>
                            </div>
                        </div>
                    </a>

                </div>
            </section>

        </div>
    </div>
</x-app-layout>
