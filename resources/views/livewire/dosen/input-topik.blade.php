<div class="max-w-4xl mx-auto py-8">
    @if($isFaseClosed)
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow">
            <p class="font-bold">Akses Ditolak</p>
            <p>Fase 1 (Pendaftaran Topik) saat ini sedang ditutup oleh Panitia TA.</p>
        </div>
    @else
        <div class="bg-white shadow sm:rounded-lg p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Usulkan Topik Tugas Akhir</h2>
            
            @if (session()->has('message'))
                <div class="mb-4 bg-green-50 text-green-700 p-3 rounded">{{ session('message') }}</div>
            @endif

            <form wire:submit="simpanTopik" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Judul Topik</label>
                    <input type="text" wire:model="judul_topik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea wire:model="deskripsi" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Kategori Proyek</label>
                    <!-- wire:model.live membuat UI bereaksi instan saat dropdown diubah -->
                    <select wire:model.live="kategori" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="Bukan Projek">Bukan Projek</option>
                        <option value="Tipe 1">Tipe 1 (PBL/Mhs Lama)</option>
                        <option value="Tipe 2">Tipe 2 (PBL/Mhs Baru)</option>
                        <option value="Tipe 3">Tipe 3 (Topik Baru)</option>
                    </select>
                </div>

                <!-- Form Dinamis Tipe 1 -->
                @if($kategori === 'Tipe 1')
                    <div class="p-4 bg-blue-50 rounded-md">
                        <label class="block text-sm font-medium text-blue-800">Pilih Mahasiswa Lama (NIM / Nama)</label>
                        <input type="number" wire:model="mahasiswa_lama_id" placeholder="Masukkan ID User Mahasiswa" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                @endif

                <!-- Form Dinamis Tipe 2 & 3 (Requirement Skill) -->
                @if(in_array($kategori, ['Tipe 2', 'Tipe 3']))
                    <div class="p-4 bg-gray-50 border border-gray-200 rounded-md">
                        <h3 class="text-md font-semibold text-gray-800 mb-3">Requirement Skill (Tingkat Keahlian 0-5)</h3>
                        <div class="grid grid-cols-3 gap-4">
                            @for ($i = 1; $i <= 9; $i++)
                                <div>
                                    <label class="block text-xs font-medium text-gray-600">Domain {{ $i }}</label>
                                    <input type="number" min="0" max="5" wire:model="requirement.domain_{{ $i }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                            @endfor
                        </div>
                    </div>
                @endif

                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
                    Simpan Topik
                </button>
            </form>
        </div>
    @endif
</div>
