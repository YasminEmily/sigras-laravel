<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return response()->json(['message' => 'Página de login não disponível'], 401);
})->name('login');
