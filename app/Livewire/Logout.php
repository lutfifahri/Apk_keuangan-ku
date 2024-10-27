<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    protected $listeners = ['logout' => 'logout'];

    public function logout()
    {
        Auth::logout(); // Logout user
        return redirect()->route('login'); // Redirect ke halaman login
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
