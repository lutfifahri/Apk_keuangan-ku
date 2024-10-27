<?php

namespace App\Livewire\Pembayaran;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pembayaran.index', [
            'title'     => 'Pembayaran'
        ])->layout('layouts.app', [
            'title' => 'Pembayaran' // Pass the title here
        ]);
    }
}
