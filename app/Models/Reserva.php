<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nome_aluno', 'matricula_aluno', 'sala', 'tipo_evento', 
        'justificativa', 'data', 'hora_inicio', 'hora_fim', 'status', 'justificativa_rejeicao'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
