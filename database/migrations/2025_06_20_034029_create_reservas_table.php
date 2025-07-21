<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Quem solicitou (docente)
            $table->string('nome_aluno');
            $table->string('matricula_aluno');
            $table->string('sala');
            $table->string('tipo_evento');
            $table->text('justificativa');
            $table->date('data');
            $table->time('hora_inicio');
            $table->time('hora_fim');
            $table->enum('status', ['pendente', 'aprovado', 'rejeitado'])->default('pendente');
            $table->text('justificativa_rejeicao')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
