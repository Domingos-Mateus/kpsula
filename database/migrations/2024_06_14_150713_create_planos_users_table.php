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
        Schema::create('planos_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plano_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->datetime('data_expiracao');
            $table->timestamps();

            $table->foreign('plano_id')->references('id')->on('planos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planos_users');
    }
};
