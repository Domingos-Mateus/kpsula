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
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('link_video');
            $table->text('imagem')->nullable();
            $table->boolean('avancar')->default(false); // Campo para controlar se o vídeo pode avançar
            $table->boolean('recuar')->default(false);  // Campo para controlar se o vídeo pode recuar
            $table->boolean('pausar')->default(true);
            $table->string('nome_video');
            $table->integer('modulo_id')->unsigned();
            $table->integer('plano_id')->unsigned();
            $table->string('descricao')->nullable();
            $table->timestamps();

            $table->foreign('modulo_id')->references('id')->on('modulos')->onDelete('cascade');
            $table->foreign('plano_id')->references('id')->on('planos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
