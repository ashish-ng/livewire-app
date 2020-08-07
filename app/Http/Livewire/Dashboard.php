<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Dashboard extends Component
{
    public $user = [];
    public $token;

    public function render()
    {
        if (empty($_COOKIE['app_token_latest'])) {
            return view('livewire.login');
        }

        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'X-Requested-With' => 'XMLHttpRequest'
        ])->withToken($_COOKIE['app_token_latest'])->get(env('API_URL') . '/user');

        if ($response->successful()) {
            $this->user = $response->json();
        } else {
            setcookie('app_token_latest', '', time() - 3600, "/");
            return view('livewire.login');
        }

        return view('livewire.dashboard');
    }
}
