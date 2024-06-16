<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    public function comentarios()
    {
        return $this->morphMany(Comentario::class, 'comentable');
    }

    public function jugadores()
    {
        return $this->hasMany(Jugador::class);
    }

    public function partidosLocal()
    {
        return $this->hasMany(Partido::class, 'local');
    }

    public function partidosVisitante()
    {
        return $this->hasMany(Partido::class, 'visitante');
    }


}
