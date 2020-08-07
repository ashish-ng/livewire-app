<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navigation extends Component
{
    public $isLoggedIn = false;

    public function render() {
        if (isset($_COOKIE['app_token_latest'])) {
            $this->isLoggedIn = true;
        }
        return view('livewire.navigation');
    }

    public function logout() {
        $this->isLoggedIn = false;
        setcookie("app_token_latest", "", time() - 3600, "/");
        return redirect(route('login'));
    }
}
