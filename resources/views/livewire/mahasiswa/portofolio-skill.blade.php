<div class="max-w-4xl mx-auto py-8">
    @if($isFaseClosed)
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow">
            <p class="font-bold">Pendaftaran Ditutup</p>
            <p>Pengisian Portofolio Skill saat ini sedang ditutup oleh Panitia TA.</p>
        </div>
    @else
        <div class="bg-white shadow sm:rounded-lg p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-2">Input Portofolio Keahlian (Skill)</h2>
            <p class="text-sm text-gray-500 mb-6">Penilaian diri terhadap 9 domain teknis. Skala 0 (Tidak Paham) hingga 5 (Sangat Ahli). Data ini akan digunakan untuk proses Matchmaking.</p>
            
            @if (session()->has('message'))
                <div class="mb-6 bg-green-50 text-green-700 p-4 rounded-md border border-green-200">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit="simpanPortofolio">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-6">
                    @php
                        // Contoh mapping nama domain (bisa disesuaikan dengan kebutuhan kampus)
                        $namaDomains = [
                            1 => 'Pemrograman Web (Frontend)',
                            2 => 'Pemrograman Web (Backend)',
                            3 => 'Aplikasi Mobile',
                            4 => 'Manajemen Basis Data',
                            5 => 'Kecerdasan Buatan / ML',
                            6 => 'Jaringan Komputer',
                            7 => 'Keamanan Siber',
                            8 => 'UI / UX Design',
                            9 => 'Internet of Things (IoT)'
                        ];
                    @endphp

                    @for ($i = 1; $i <= 9; $i++)
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <label class="block text-sm font-medium text-gray-800 mb-1">
                                Domain {{ $i }}
                            </label>
                            <span class="block text-xs text-gray-500 mb-2 h-8">{{ $namaDomains[$i] }}</span>
                            
                            <input type="number" 
                                   min="0" 
                                   max="5" 
                                   wire:model="domains.{{ $i }}" 
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            
                            @error('domains.'.$i) 
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> 
                            @enderror
                        </div>
                    @endfor
                </div>

                <div class="flex items-center justify-end">
                    <!-- Indikator Loading saat tombol ditekan -->
                    <div wire:loading wire:target="simpanPortofolio" class="mr-3 text-sm text-indigo-600 font-medium">
                        Menyimpan data...
                    </div>
                    
                    <button type="submit" wire:loading.attr="disabled" class="bg-indigo-600 text-white py-2 px-6 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors disabled:opacity-50">
                        Simpan Portofolio
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
