<?php

namespace App\Http\Controllers;

use App\Models\Notificacao;
use App\Models\User;
use Illuminate\Http\Request;

class NotificacaoController extends Controller
{
    public function index($userId)
    {
        $user = User::findOrFail($userId);
        return $user->notificacoes; // Retorna todas as notificações de um usuário
    }

    public function update(Request $request, $id)
    {
        $notificacao = Notificacao::findOrFail($id);
        $notificacao->visualizado = true;
        $notificacao->save();

        return response()->json($notificacao);
    }
}
