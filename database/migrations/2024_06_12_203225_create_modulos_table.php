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
        Schema::create('modulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_modulo');
            $table->string('descricao')->nullable();
            $table->string('foto_modulo')->nullable();
            $table->integer('plano_id')->unsigned();
            $table->timestamps();

            $table->foreign('plano_id')->references('id')->on('planos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modulos');
    }
};
