<?php

namespace App\Livewire\UangMasuk;

use App\Models\per_page;
use App\Models\Uang_Masuk;
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
        $uangmasuk = Uang_Masuk::find($this->pk);
        if (!$uangmasuk) {
            $this->alert('error', 'Gagal', [
                'message' => 'Data Service Lexus tidak ditemukan!',
            ]);
        } else {
            DB::beginTransaction();

            try {
                $uangmasuk->detailuangmasuk()->delete();
                $uangmasuk->delete();

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
            $this->uangmasuk = Uang_Masuk::query()->filter([
                'search' => $this->search,
            ])->orderByDesc('id')->paginate($this->per_page)->withQueryString();
        } else {
            $this->uangmasuk = Uang_Masuk::query()->filter([
                'search' => $this->search,
                'filter' => $this->filter,
            ])->orderByDesc('id')->paginate($this->per_page)->withQueryString();
        }

        return view('livewire.uang-masuk.index', [
            'title'     => 'Uang Masuk',
            'uangmasuk' => $this->uangmasuk,
            'per_pages' => per_page::all(),
        ])->layout('layouts.app', [
            'title' => 'Uang Masuk' // Pass the title here
        ]);
    }
}
