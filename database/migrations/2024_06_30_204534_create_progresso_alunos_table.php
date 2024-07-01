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
        Schema::create('progresso_alunos', function (Blueprint $table) {
            $table->id();
            $table->integer('modulo_id');
            $table->integer('video_id');
            $table->integer('user_id');
            $table->integer('avaliacao')->nullable();
            $table->boolean('concluida')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progresso_alunos');
    }
};
