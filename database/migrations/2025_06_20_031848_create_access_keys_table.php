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
        Schema::create('access_keys', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->enum('role', ['docente', 'coordenador']);
            $table->boolean('used')->default(false); // para evitar reuso
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('access_keys');
    }

};
