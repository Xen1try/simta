<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Kontrol Fase & Gatekeeper</h2>
            <p class="text-sm text-gray-600 mt-1">Aktifkan atau nonaktifkan gerbang waktu (Phase) untuk mengontrol akses pendaftaran dan aktivitas mahasiswa serta dosen.</p>
        </div>

        @if (session()->has('message'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-md shadow-sm transition-all">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700 font-medium">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Phase 1 Card -->
            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Phase 1: Pendaftaran</h3>
                        
                        <!-- Toggle Switch -->
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" wire:click="togglePhase('phase_1_active')" {{ $phase_1_active ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                    <p class="text-sm text-gray-500">Membuka form pengajuan judul mandiri (mahasiswa), form portofolio (mahasiswa), dan input topik proyek (dosen).</p>
                    <div class="mt-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $phase_1_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            Status: {{ $phase_1_active ? 'Terbuka' : 'Ditutup' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Phase 2 Card -->
            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Phase 2: Matchmaking</h3>
                        
                        <!-- Toggle Switch -->
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" wire:click="togglePhase('phase_2_active')" {{ $phase_2_active ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                    <p class="text-sm text-gray-500">Mengaktifkan tombol akses algoritma perjodohan otomatis dan validasi hasil oleh panitia (Super Admin Override).</p>
                    <div class="mt-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $phase_2_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            Status: {{ $phase_2_active ? 'Terbuka' : 'Ditutup' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Phase 3 Card -->
            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Phase 3: Ujian & Nilai</h3>
                        
                        <!-- Toggle Switch -->
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" wire:click="togglePhase('phase_3_active')" {{ $phase_3_active ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                    <p class="text-sm text-gray-500">Mengaktifkan modul penjadwalan ujian dan fitur pengisian nilai sidang oleh dosen penguji (Active Exam Mode).</p>
                    <div class="mt-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $phase_3_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            Status: {{ $phase_3_active ? 'Terbuka' : 'Ditutup' }}
                        </span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Indikator Loading Global -->
        <div wire:loading class="fixed bottom-5 right-5 bg-gray-800 text-white text-sm px-4 py-2 rounded-md shadow-lg flex items-center gap-2 animate-pulse">
            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Memperbarui status server...
        </div>

    </div>
</div>
