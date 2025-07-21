<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        return Reserva::all(); // Retorna todas as reservas
    }

    public function show($id)
    {
        return Reserva::findOrFail($id); // Exibe uma reserva específica
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nome_aluno' => 'required',
            'matricula_aluno' => 'required',
            'sala' => 'required',
            'tipo_evento' => 'required',
            'data' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fim' => 'required',
        ]);

        $reserva = Reserva::create($request->all());

        return response()->json($reserva, 201); // Retorna a reserva criada
    }

    public function update(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->update($request->all());

        return response()->json($reserva);
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return response()->json(null, 204); // Retorna status 204 para remoção bem-sucedida
    }
}
