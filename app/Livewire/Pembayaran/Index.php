<?php

namespace App\Livewire\Pembayaran;

use App\Models\Pemabayaran;
use App\Models\per_page;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Throwable;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public $search;
    #[Url]
    public $filter;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[Url]
    public $per_page = 15;

    public $listeners = [
        'confirmedDelete',
    ];

    public $pk;
    public function mount()
    {
        $this->filter = "All";
    }

    public function delete($pk)
    {
        $this->pk = $pk;

        $this->confirm('Apakah anda yakin?', [
            'html' => 'Data Gaji ini akan dihapus!',
            'onConfirmed' => 'confirmedDelete',
        ]);
    }

    public function confirmedDelete()
    {
        $pemabayaran = Pemabayaran::find($this->pk);
        if (!$pemabayaran) {
            $this->alert('error', 'Gagal', [
                'message' => 'Data Service Lexus tidak ditemukan!',
            ]);
        } else {
            DB::beginTransaction();

            try {
                $pemabayaran->detailpemabayaran()->delete();
                $pemabayaran->delete();

                DB::commit();

                $this->alert('success', 'Berhasil', [
                    'text' => 'Data Service Lexus berhasil dihapus!',
                ]);
            } catch (Throwable $e) {
                DB::rollBack();

                $this->alert('error', 'Gagal', [
                    'text' => $e->getMessage(),
                ]);
            }
        }
    }

    public function render()
    {
        if ($this->filter == "All") {
            $this->Pemabayaran = Pemabayaran::query()->filter([
                'search' => $this->search,
            ])->orderByDesc('id')->paginate($this->per_page)->withQueryString();
        } else {
            $this->Pemabayaran = Pemabayaran::query()->filter([
                'search' => $this->search,
                'filter' => $this->filter,
            ])->orderByDesc('id')->paginate($this->per_page)->withQueryString();
        }

        return view('livewire.pembayaran.index', [
            'title'         => 'Pembayaran',
            'Pemabayaran'   => $this->Pemabayaran,
            'per_pages'     => per_page::all(),
        ])->layout('layouts.app', [
            'title' => 'Pembayaran' // Pass the title here
        ]);
    }
}
