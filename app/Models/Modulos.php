<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    use HasFactory;

    // Relação hasMany com Videos
    public function videos()
    {
        return $this->hasMany(Videos::class, 'modulo_id');
    }
}
