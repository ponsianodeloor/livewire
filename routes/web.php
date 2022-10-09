<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowPosts;
use App\Http\Livewire\ShowParamUrl;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', ShowPosts::class)->name('dashboard');
    Route::get('/show_param_url/{param_url}', ShowParamUrl::class)->name('show-param-url');
});
