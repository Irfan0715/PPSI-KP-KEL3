<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Riwayat Bimbingan</h2></x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm border border-gray-200 rounded-xl">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm divide-y divide-gray-200">
                            <thead class="bg-gray-50"><tr>
                                <th class="px-4 py-2 text-left">Tanggal</th>
                                <th class="px-4 py-2 text-left">Mahasiswa</th>
                                <th class="px-4 py-2 text-left">Topik/Catatan</th>
                                <th class="px-4 py-2 text-left">Status</th>
                            </tr></thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($bimbingans as $b)
                                <tr>
                                    <td class="px-4 py-2">{{ ($b->tanggal_bimbingan ?? $b->tanggal ?? $b->created_at)->format('d M Y') }}</td>
                                    <td class="px-4 py-2">{{ $b->mahasiswa->name ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $b->topik_bimbingan ?? $b->catatan ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $b->status ?? 'selesai' }}</td>
                                </tr>
                                @empty
                                <tr><td class="px-4 py-3 text-gray-500" colspan="4">Belum ada bimbingan.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

