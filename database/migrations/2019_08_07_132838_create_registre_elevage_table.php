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
        Schema::create('registre_elevage', function (Blueprint $table) {
            $table->primary(['ruche_id', 'visite_id']);
            $table->timestamps();

            $table->foreignId('ruche_id')->constrained();
            $table->foreignId('visite_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registre_elevage');
    }
};
