<div class="max-w-4xl mx-auto py-8">
    @if($isFaseClosed)
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow">
            <p class="font-bold">Pendaftaran Ditutup</p>
        </div>
    @else
        <div class="bg-white shadow sm:rounded-lg p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Pengajuan Judul Mandiri</h2>
            
            @if (session()->has('message'))
                <div class="mb-4 bg-green-50 text-green-700 p-3 rounded">{{ session('message') }}</div>
            @endif

            <form wire:submit="ajukanJudul" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Judul Tugas Akhir</label>
                    <!-- wire:model.blur memvalidasi setelah user keluar dari kolom input -->
                    <input type="text" wire:model.blur="judul_topik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @error('judul_topik') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea wire:model.blur="deskripsi" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Bukti Persetujuan Kaprodi (PDF/IMG, Max: 2MB)</label>
                    <input type="file" wire:model="bukti_acc" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-indigo-50 file:text-indigo-700">
                    <div wire:loading wire:target="bukti_acc" class="text-sm text-indigo-500 mt-1">Mengunggah...</div>
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
                    Ajukan Usulan
                </button>
            </form>
        </div>
    @endif
</div>
