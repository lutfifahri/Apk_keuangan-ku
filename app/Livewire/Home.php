<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'title' => 'Home'
        ])->layout('layouts.app', [
            'title' => 'Home' // Pass the title here
        ]);
    }
}
