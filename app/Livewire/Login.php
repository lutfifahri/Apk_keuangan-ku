<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    #[Validate('required', message: 'Email tidak boleh kosong!')]
    public $email;
    #[Validate('required', message: 'Password tidak boleh kosong!')]
    #[Validate('min:6', message: 'Maaf, Password harus lebih dari 6 karakter!')]
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Redirect ke halaman home setelah berhasil login
            return redirect()->route('home');
        } else {
            // Jika gagal, kirim pesan error
            session()->flash('error', 'Email atau password salah');
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth');
    }
}
