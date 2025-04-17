<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $username, $password, $remember;

    protected $rules = [
        'username' => ['required', 'exists:users,username'],
        'password' => ['required', 'string'],
        'remember' => ['nullable', 'boolean']
    ];

    public function login()
    {
        $this->validate();
        if (!Auth::attempt(['username' => $this->username, 'password' => $this->password], (bool) $this->remember)) {
            return redirect()->back()->with('error', 'Unable to log in. Please check username/password.');
        }

        return redirect()->route('authd.home');
    }

    public function render()
    {
        return view('auth.login');
    }
}
