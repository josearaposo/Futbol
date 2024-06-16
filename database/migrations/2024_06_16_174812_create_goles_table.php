<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('goles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jugador_id')->constrained('jugadores');
            $table->foreignId('partido_id')->constrained();
            $table->integer('minuto');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE goles ADD CONSTRAINT check_minuto CHECK (minuto >= 0 AND minuto <= 90)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goles');
    }
};
