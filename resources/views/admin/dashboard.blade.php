<x-app-layout>
    <!-- Custom Topbar -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="text-indigo-600 font-extrabold">Sistem Informasi KP</span>
                <form action="{{ route('admin.users') }}" method="GET" class="hidden md:block">
                    <label class="relative block">
                        <span class="sr-only">Search</span>
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"/></svg>
                        </span>
                        <input name="q" placeholder="Cari…" class="pl-9 pr-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500 w-72" />
                    </label>
                </form>
            </div>
            <div class="flex items-center gap-4">
                <button class="relative text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5"/></svg>
                    <span class="absolute -top-1 -right-1 bg-indigo-600 text-white text-[10px] rounded-full px-1">3</span>
                </button>
                <div class="flex items-center gap-2">
                    <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700">K</div>
                    <div class="hidden sm:block">
                        <div class="text-sm font-medium text-gray-900">Koordinator KP</div>
                        <form method="POST" action="{{ route('logout') }}" class="text-xs text-gray-500">
                            @csrf
                            <button class="hover:text-red-600">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Sidebar -->
        <aside class="lg:col-span-3 bg-white rounded-xl border border-gray-200 shadow-sm p-4 h-max">
            <nav class="space-y-1 text-sm">
                @php $active = request()->routeIs('admin.dashboard'); @endphp
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg {{ $active ? 'bg-blue-50 text-blue-700' : 'hover:bg-gray-50 text-gray-700' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M3 12l9-9 9 9v9a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1v-9z"/></svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.users') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-50 text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M16 14a4 4 0 10-8 0 4 4 0 008 0z"/><path d="M12 14c-4.418 0-8 1.79-8 4v2h16v-2c0-2.21-3.582-4-8-4z"/></svg>
                    <span>Data Akun Pengguna</span>
                </a>
                <a href="{{ route('admin.instansi.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-50 text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M3 7l9-4 9 4-9 4-9-4zm0 6l9 4 9-4v7H3v-7z"/></svg>
                    <span>Data Instansi</span>
                </a>
                <a href="{{ route('admin.lowongan.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-50 text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M4 4h16v4H4zM4 10h16v4H4zM4 16h10v4H4z"/></svg>
                    <span>Lowongan KP</span>
                </a>
                <a href="{{ route('admin.alokasi.pembimbing') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-50 text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12a5 5 0 100-10 5 5 0 000 10z"/><path d="M12 14c-5 0-9 2.239-9 5v3h18v-3c0-2.761-4-5-9-5z"/></svg>
                    <span>Dosen Pembimbing & Penguji</span>
                </a>
                <a href="{{ route('admin.monitoring') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-50 text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M4 6h16v2H4zM4 11h10v2H4zM4 16h16v2H4z"/></svg>
                    <span>Monitoring & Laporan</span>
                </a>
                <a href="{{ route('admin.monitoring') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-50 text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 7a5 5 0 100 10 5 5 0 000-10z"/><path d="M2 12a10 10 0 1120 0 10 10 0 01-20 0z"/></svg>
                    <span>Kuesioner & Evaluasi</span>
                </a>
            </nav>
            <div class="mt-6 text-xs text-gray-500">© 2025 Sistem Informasi KP<br/>Universitas [Nama Kampus] · Versi 1.0</div>
        </aside>

        <!-- Main -->
        <main class="lg:col-span-9 space-y-6">
            <!-- KPI cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="rounded-xl p-5 bg-white border border-gray-200 shadow-md">
                    <div class="text-sm text-gray-600">Mahasiswa Aktif KP</div>
                    <div class="mt-1 text-3xl font-bold text-gray-900">{{ $mhsAktifKP ?? 0 }}</div>
                </div>
                <div class="rounded-xl p-5 bg-white border border-gray-200 shadow-md">
                    <div class="text-sm text-gray-600">Instansi Terdaftar</div>
                    <div class="mt-1 text-3xl font-bold text-gray-900">{{ $instansiTerdaftar ?? 0 }}</div>
                </div>
                <div class="rounded-xl p-5 bg-white border border-gray-200 shadow-md">
                    <div class="text-sm text-gray-600">Dosen Pembimbing</div>
                    <div class="mt-1 text-3xl font-bold text-gray-900">{{ $dosenPembimbingCount ?? 0 }}</div>
                </div>
                <div class="rounded-xl p-5 bg-white border border-gray-200 shadow-md">
                    <div class="text-sm text-gray-600">Laporan Masuk</div>
                    <div class="mt-1 text-3xl font-bold text-gray-900">{{ $laporanMasuk ?? 0 }}</div>
                </div>
            </div>

            <!-- Charts removed per request -->

            <!-- Aktivitas terbaru -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-md">
                <div class="px-6 py-4 flex items-center justify-between">
                    <div class="text-gray-900 font-semibold">Aktivitas Terbaru</div>
                    <a href="{{ route('kerja-praktek.index') }}" class="text-indigo-600 text-sm hover:underline">Lihat semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-gray-600">
                            <tr>
                                <th class="px-6 py-3 text-left font-medium">Tanggal</th>
                                <th class="px-6 py-3 text-left font-medium">Mahasiswa</th>
                                <th class="px-6 py-3 text-left font-medium">Judul / Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($kpTerbaru as $kp)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-3">{{ $kp->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-3">{{ $kp->mahasiswa->name ?? '-' }}</td>
                                    <td class="px-6 py-3">{{ $kp->judul_kp ?? '-' }} <span class="text-xs text-gray-500">({{ $kp->status }})</span></td>
                                </tr>
                            @empty
                                <tr><td class="px-6 py-4 text-gray-500" colspan="3">Belum ada aktivitas.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    
</x-app-layout>
