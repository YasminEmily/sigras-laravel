<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_create_salas_table.php

    public function up()
{
        Schema::create('salas', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique(); 
            $table->integer('capacidade')->nullable(); 
            $table->timestamps();
        });
}

};
