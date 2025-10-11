<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Header -->
            <header class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-900">Dashboard Admin</h2>
                <span class="text-gray-600">Selamat datang, {{ auth()->user()->nama }}!</span>
            </header>

            <!-- Statistik -->
            <div class="flex flex-wrap gap-10 justify-between">
                <div class="flex items-center bg-blue-500 text-white p-5 rounded-xl shadow-md space-x-4 flex-1 min-w-[200px]">
                    <div class="text-4xl">👥</div>
                    <div>
                        <p class="text-3xl font-bold">{{ $totalUsers ?? 0 }}</p>
                        <p class="text-sm">Total Users</p>
                    </div>
                </div>
                <div class="flex items-center bg-green-500 text-white p-5 rounded-xl shadow-md space-x-4 flex-1 min-w-[200px]">
                    <div class="text-4xl">🏢</div>
                    <div>
                        <p class="text-3xl font-bold">{{ $totalInstansi ?? 0 }}</p>
                        <p class="text-sm">Total Instansi</p>
                    </div>
                </div>
                <div class="flex items-center bg-yellow-300 text-gray-900 p-5 rounded-xl shadow-md space-x-4 flex-1 min-w-[200px]">
                    <div class="text-4xl">📋</div>
                    <div>
                        <p class="text-3xl font-bold">{{ $totalLowongan ?? 0 }}</p>
                        <p class="text-sm">Total Lowongan KP</p>
                    </div>
                </div>
                <div class="flex items-center bg-purple-500 text-white p-5 rounded-xl shadow-md space-x-4 flex-1 min-w-[200px]">
                    <div class="text-4xl">📊</div>
                    <div>
                        <p class="text-3xl font-bold">{{ $totalKuota ?? 0 }}</p>
                        <p class="text-sm">Total Kuota</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('admin.users') }}" class="block bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold mb-2">Manajemen Users</h3>
                    <p class="text-gray-600">Kelola pengguna sistem</p>
                </a>
                <a href="{{ route('admin.instansi.index') }}" class="block bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold mb-2">Manajemen Instansi</h3>
                    <p class="text-gray-600">Kelola instansi kerja praktek</p>
                </a>
                <a href="{{ route('admin.lowongan.index') }}" class="block bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold mb-2">Manajemen Lowongan KP</h3>
                    <p class="text-gray-600">Kelola lowongan kerja praktek</p>
                </a>
            </section>
        </div>
    </div>
</x-app-layout>
