<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'tipo', 'mensagem', 'visualizado'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
