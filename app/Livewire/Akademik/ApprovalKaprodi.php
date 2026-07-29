<?php

namespace App\Livewire\Akademik;

use Livewire\Component;
use App\Models\TopikTa;

class ApprovalKaprodi extends Component
{
    // Property untuk menangani modal konfirmasi penolakan (jika ada)
    public $selectedId;
    public $isRejectModalOpen = false;

    // Fungsi aksi persetujuan
    public function approve($id)
    {
        $topik = TopikTa::find($id);
        if ($topik) {
            $topik->update(['status_approval_kaprodi' => 'Approved']);
            session()->flash('message', 'Judul berhasil disetujui dan masuk ke Pool Data.');
        }
    }

    // Fungsi aksi penolakan
    public function reject($id)
    {
        $topik = TopikTa::find($id);
        if ($topik) {
            $topik->update(['status_approval_kaprodi' => 'Rejected']);
            session()->flash('message', 'Judul mandiri telah ditolak.');
        }
    }

    public function render()
    {
        // AKAR SOLUSINYA DI SINI:
        // Kita query ke SQL Server untuk mengambil topik yang berstatus 'Mandiri' dan 'Pending'
        $queryPending = TopikTa::where('asal_usul', 'Mandiri')
                               ->where('status_approval_kaprodi', 'Pending')
                               ->get();

        // Kita "suapkan" data tersebut ke view menggunakan array binding
        return view('livewire.akademik.approval-kaprodi', [
            'pendingJudul' => $queryPending
        ]);
    }
}