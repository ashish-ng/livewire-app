<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::livewire('/', 'home');
Route::livewire('/login', 'login')->name('login');
Route::livewire('/register', 'signup');
Route::livewire('/dashboard', 'dashboard')->name('dashboard')->middleware('authenticate.request');
