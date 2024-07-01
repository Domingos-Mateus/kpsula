<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressoAluno extends Model
{
    use HasFactory;

    protected $table = 'progresso_alunos';

    protected $fillable = [
        'id',
        'modulo_id',
        'video_id',
        'user_id',
        'avaliacao',
        'concluida',
    ];
}
