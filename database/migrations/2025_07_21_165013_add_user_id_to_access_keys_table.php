<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('access_keys', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->nullable()->after('used');

        $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('access_keys', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    });
}

};
