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
        Schema::create('ruchers_recolte', function (Blueprint $table) {
            $table->primary(['rucher_id', 'recolte_id']);
            $table->timestamps();

            $table->foreignId('rucher_id')->constrained();
            $table->foreignId('recolte_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruchers_recolte');
    }
};
