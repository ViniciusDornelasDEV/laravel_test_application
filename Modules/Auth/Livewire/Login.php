<?php

namespace Modules\Auth\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;
    public $errorMessage = '';

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Informe o e-mail',
            'email.email' => 'E-mail inválido',
            'password.required' => 'Informe a senha',
        ]);
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            return redirect()->intended('/');
        }
        $this->errorMessage = 'E-mail ou senha incorretos';
    }

    public function render()
    {
        return view('auth::livewire.login')->layout('auth::layouts.auth'); // ajuste o layout se precisar
    }
}