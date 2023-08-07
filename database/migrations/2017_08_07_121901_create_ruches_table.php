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
        Schema::create('ruches', function (Blueprint $table) {
            $table->id();
            $table->string('nom_ruche', 100);
            $table->integer('numero');
            $table->string('espece', 100);
            $table->string('provenance', 100);
            $table->string('lignee_reine', 100);
            $table->integer('nombre_cadres');
            $table->timestamps();

            $table->foreignId('rucher_id')->nullable()->constrained()->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruches');
    }
};
