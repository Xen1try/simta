<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="text-xl font-bold text-gray-900 mb-2">Persetujuan Judul Mandiri (Kaprodi)</h2>
        <p class="text-sm text-gray-600 mb-6">Daftar usulan judul tugas akhir mahasiswa yang memerlukan validasi.</p>

        @if (session()->has('message'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('message') }}
            </div>
        @endif

        <div class="bg-white shadow-xl sm:rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mahasiswa</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul TA</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pendingJudul as $topik)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $topik->mahasiswa->name ?? '-' }}
                                <div class="text-xs text-gray-400">{{ $topik->mahasiswa->nomor_induk ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 font-semibold">
                                {{ $topik->judul }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ Str::limit($topik->deskripsi, 50) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <button wire:click="approve({{ $topik->id }})" class="text-green-600 hover:text-green-900 mr-3 font-bold">Approve</button>
                                <button wire:click="reject({{ $topik->id }})" class="text-red-600 hover:text-red-900 font-bold">Reject</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                Tidak ada usulan judul mandiri yang pending.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>