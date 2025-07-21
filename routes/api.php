<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\NotificacaoController;
use App\Http\Controllers\AccessKeyController;
use App\Http\Controllers\AuthController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

// Login sem middleware
Route::post('login', [AuthController::class, 'login']);
Route::post('/definir-senha', [AuthController::class, 'definirSenha']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


// Rotas protegidas que precisam de autenticação
Route::middleware('auth:sanctum')->group(function () {
    Route::get('reservas', [ReservaController::class, 'index']);
    Route::get('reservas/{id}', [ReservaController::class, 'show']);
    Route::post('reservas', [ReservaController::class, 'store']);
    Route::put('reservas/{id}', [ReservaController::class, 'update']);
    Route::delete('reservas/{id}', [ReservaController::class, 'destroy']);
});

// Rotas de notificações
Route::get('notificacoes/{userId}', [NotificacaoController::class, 'index']);
Route::put('notificacoes/{id}', [NotificacaoController::class, 'update']);

// Rotas de chaves de acesso
Route::post('access-keys', [AccessKeyController::class, 'store']);
Route::get('access-keys/{id}', [AccessKeyController::class, 'show']);
