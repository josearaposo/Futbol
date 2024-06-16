<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    public function comentarios()
    {
        return $this->morphMany(Comentario::class, 'comentable');

    }

    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'local');
    }

    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'visitante');
    }

    public function goles()
    {
        return $this->morphMany(Gol::class, 'comentable');
    }
}
