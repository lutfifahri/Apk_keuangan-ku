<?php

namespace App\Livewire\Dipinjam;

use App\Models\Di_pinjam;
use App\Models\per_page;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\DB;
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
        $gaji = Di_pinjam::find($this->pk);
        if (!$gaji) {
            $this->alert('error', 'Gagal', [
                'message' => 'Data Service Lexus tidak ditemukan!',
            ]);
        } else {
            DB::beginTransaction();

            try {
                $gaji->detailgaji()->delete();
                $gaji->delete();

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
            $this->dipinjam = Di_pinjam::query()->filter([
                'search' => $this->search,
            ])->orderByDesc('id')->paginate($this->per_page)->withQueryString();
        } else {
            $this->dipinjam = Di_pinjam::query()->filter([
                'search' => $this->search,
                'filter' => $this->filter,
            ])->orderByDesc('id')->paginate($this->per_page)->withQueryString();
        }

        return view('livewire.dipinjam.index', [
            'title'     => 'Di Pinjam',
            'dipinjam'  => $this->dipinjam,
            'per_pages' => per_page::all(),
        ])->layout('layouts.app', [
            'title' => 'Di Pinjam' // Pass the title here
        ]);
    }
}
