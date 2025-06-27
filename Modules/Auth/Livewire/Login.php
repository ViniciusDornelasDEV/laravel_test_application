<?php

namespace Modules\Auth\Livewire;

use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            return redirect()->intended('/dashboard'); // ajuste conforme necessário
        }

        $this->addError('email', 'Credenciais inválidas.');
    }

    public function render()
    {
        return view('auth::livewire.login')->layout('product::layouts.master');
    }
}