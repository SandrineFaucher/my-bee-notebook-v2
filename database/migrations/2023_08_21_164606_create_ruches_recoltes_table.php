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
        Schema::create('ruches_recoltes', function (Blueprint $table) {
            $table->primary(['ruche_id', 'recolte_id']);
            $table->timestamps();

            $table->foreignId('ruche_id')->constrained()->onDelete('cascade');
            $table->foreignId('recolte_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruches_recoltes');
    }
};
