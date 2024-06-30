<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;
    public function modulo()
{
    return $this->belongsTo(Modulos::class, 'modulo_id');
}
protected $fillable = [
    'link_video',
    'imagem',
    'avancar',
    'recuar',
    'pausar',
    'nome_video',
    'modulo_id',
    'descricao',
    'width',
    'height'
];

// Define valores padrão para os atributos de largura e altura
protected $attributes = [
    'width' => 500,
    'height' => 1080
];

}
