<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Monitoring & Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded shadow">
                    <div class="text-gray-500 text-sm">Total Mahasiswa</div>
                    <div class="text-3xl font-bold">{{ $totalMahasiswa }}</div>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <div class="text-gray-500 text-sm">Total Dosen</div>
                    <div class="text-3xl font-bold">{{ $totalDosen }}</div>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <div class="text-gray-500 text-sm">Total KP</div>
                    <div class="text-3xl font-bold">{{ $totalKP }}</div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold mb-4">Distribusi Status KP</h3>
                    <ul class="space-y-2">
                        @foreach($kpByStatus as $status => $total)
                            <li class="flex justify-between">
                                <span class="capitalize">{{ $status ?: 'tidak diketahui' }}</span>
                                <span class="font-semibold">{{ $total }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold mb-4">Ringkasan Aktivitas</h3>
                    <ul class="space-y-2">
                        <li class="flex justify-between"><span>KP Berlangsung</span><span class="font-semibold">{{ $kpBerlangsung }}</span></li>
                        <li class="flex justify-between"><span>KP Selesai</span><span class="font-semibold">{{ $kpSelesai }}</span></li>
                        <li class="flex justify-between"><span>Total Bimbingan</span><span class="font-semibold">{{ $bimbinganCount }}</span></li>
                    </ul>
                </div>
            </div>

            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-4">Instansi Dengan KP Terbanyak</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-2 text-left">Instansi</th>
                                <th class="px-4 py-2 text-left">Total KP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($instansiTop as $row)
                                <tr class="border-t">
                                    <td class="px-4 py-2">{{ $row->instansi->nama_instansi ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $row->total }}</td>
                                </tr>
                            @empty
                                <tr><td class="px-4 py-2" colspan="2">Belum ada data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

