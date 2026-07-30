<?php

namespace App\Livewire\Akademik;

use App\Models\TopikTa;
use Illuminate\View\View;
use Livewire\Component;

class ApprovalKaprodi extends Component
{
    public ?int $selectedId = null;

    public bool $isRejectModalOpen = false;

    public function approve(int $id): void
    {
        /** @var TopikTa $topik */
        $topik = TopikTa::find($id);
        if ($topik) {
            $topik->update(['status_approval_kaprodi' => 'Approved']);
            session()->flash('message', 'Judul berhasil disetujui dan masuk ke Pool Data.');
        }
    }

    public function reject(int $id): void
    {
        /** @var TopikTa $topik */
        $topik = TopikTa::find($id);
        if ($topik) {
            $topik->update(['status_approval_kaprodi' => 'Rejected']);
            session()->flash('message', 'Judul mandiri telah ditolak.');
        }
    }

    public function render(): View
    {
        $queryPending = TopikTa::where('asal_usul', 'Mandiri')
            ->where('status_approval_kaprodi', 'Pending')
            ->get();

        return view('livewire.akademik.approval-kaprodi', [
            'pendingJudul' => $queryPending,
        ]);
    }
}
