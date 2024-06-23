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

}
