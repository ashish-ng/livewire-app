<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty($_COOKIE['app_token_latest'])) {
            session()->flash('message', 'your session has been expired. Please log in again');
            return redirect('login');
        }

        // $response = Http::withHeaders([
        //     'Content-Type' => 'application/x-www-form-urlencoded',
        //     'X-Requested-With' => 'XMLHttpRequest'
        // ])->withToken($_COOKIE['app_token_latest'])->get('http://api.sample.test/api/user');

        // if ($response->successful()) {
        //     $this->user = $response->json();
        // } else {
        //     setcookie('app_token_latest', '', time() - 3600, "/");
        //     //session()->flash('message', 'your session has been expired. Please log in again');
        //     return redirect('login');
        // }

        return $next($request);
    }
}
