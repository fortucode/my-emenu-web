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
        Schema::create('contenir', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_combo')->constrained('combo')->onDelete('cascade'); // Clé étrangère vers combos.
            $table->foreignId('id_plat')->constrained('plat')->onDelete('cascade');   // Clé étrangère vers plats.
            $table->integer('quantite')->default(1); // Quantité de ce plat dans le combo.
            $table->timestamps(); // Pour la gestion de la création et mise à jour.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenir');
    }
};
