<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Manajemen Role & Hak Akses</h2>
            <p class="text-sm text-gray-500 mt-1">Atur izin sistem (Dynamic RBAC) secara matriks. Perubahan langsung tersimpan ke database.</p>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <th class="p-4 font-semibold text-gray-700">Daftar Fitur (Permissions)</th>
                            @foreach($roles as $role)
                                <th class="p-4 font-semibold text-center text-gray-700">
                                    {{ $role->role_name }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($permissions as $permission)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="p-4">
                                    <div class="font-medium text-gray-900">{{ $permission->permission_name }}</div>
                                    <div class="text-xs text-gray-500 font-mono mt-1 px-2 py-0.5 bg-gray-100 rounded inline-block">
                                        {{ $permission->permission_code }}
                                    </div>
                                </td>
                                @foreach($roles as $role)
                                    @php
                                        // Cek apakah role ini memiliki permission yang sedang di-looping
                                        $hasPermission = $role->permissions->contains('id', $permission->id);
                                    @endphp
                                    <td class="p-4 text-center">
                                        <!-- Tailwind Toggle Switch -->
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" 
                                                   class="sr-only peer"
                                                   wire:click="togglePermission({{ $role->id }}, {{ $permission->id }})"
                                                   {{ $hasPermission ? 'checked' : '' }}>
                                            <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                                        </label>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Indikator Loading Livewire (Akan muncul di pojok kanan bawah saat data diproses) -->
        <div wire:loading class="fixed bottom-5 right-5 bg-gray-800 text-white text-sm px-4 py-2 rounded-md shadow-lg flex items-center gap-2 animate-pulse">
            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Menyimpan sinkronisasi...
        </div>

    </div>
</div>

