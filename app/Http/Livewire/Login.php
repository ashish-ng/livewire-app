<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.login');
    }

    public function login()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'X-Requested-With' => 'XMLHttpRequest'
        ])->asForm()->post(env('API_URL') . '/token', [
            'email' => $this->email,
            'password' => $this->password,
            'device_name' => 'web'
        ]);

        if ($response->successful()) {
            setcookie('app_token_latest', $response->json()['token'], time() + (86400 * 30), "/");
            return redirect(route('dashboard'));
        } else {
            throw ValidationException::withMessages($response->json()['errors']);
        }
    }
}
