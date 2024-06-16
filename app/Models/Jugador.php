<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $table = 'jugadores';

    public function comentarios()
    {
        return $this->morphMany(Comentario::class, 'comentable');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function goles()
    {
        return $this->morphMany(Gol::class, 'comentable');
    }
}
