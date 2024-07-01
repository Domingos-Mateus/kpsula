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
            $table->boolean('avancar')->default(false);
            $table->boolean('recuar')->default(false);
            $table->boolean('pausar')->default(true);
            $table->integer('posicao_video')->nullable();
            $table->string('nome_video');
            $table->integer('modulo_id')->unsigned();
            $table->string('descricao')->nullable();
            $table->integer('width')->default(500); // Define a largura padrão
            $table->integer('height')->default(1080); // Define a altura padrão
            $table->timestamps();

            $table->foreign('modulo_id')->references('id')->on('modulos')->onDelete('cascade');
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
