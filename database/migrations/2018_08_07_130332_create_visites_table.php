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
        Schema::create('visites', function (Blueprint $table) {
            $table->id();
            $table->integer('nombre_cadres_abeilles');
            $table->integer('nombre_cadres_couvain');
            $table->integer('nombre_cadres_miel');
            $table->integer('nombre_hausses');
            $table->string('reine_vue', 191);
            $table->integer('cellules_royales');
            $table->string('ruche_orpheline', 191);
            $table->string('essaimage', 191);
            $table->string('nourrissement', 191);
            $table->string('traitement', 191);
            $table->boolean('grille_reine');
            $table->boolean('chasse_abeilles');
            $table->integer('grille_propolis');
            $table->date('date_visite');
            $table->integer('force');
            $table->text('commentaire');
            $table->timestamps();

            $table->foreignId('ruche_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visites');
    }
};
