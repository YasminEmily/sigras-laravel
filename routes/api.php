<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\NotificacaoController;
use App\Http\Controllers\AccessKeyController;
use App\Http\Controllers\AuthController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use App\Http\Controllers\SalaController;

// Login sem middleware testado ok
Route::post('login', [AuthController::class, 'login']);
Route::post('/definir-senha', [AuthController::class, 'definirSenha']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


// Rotas protegidas que precisam de autenticação testado ok
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/salas', [SalaController::class, 'index']);       // listar salas
    Route::post('/salas', [SalaController::class, 'store']);      // criar sala
    Route::get('/salas/{id}', [SalaController::class, 'show']);   // mostrar sala específica
    Route::put('/salas/{id}', [SalaController::class, 'update']); // atualizar
    Route::delete('/salas/{id}', [SalaController::class, 'destroy']); // deletar
});