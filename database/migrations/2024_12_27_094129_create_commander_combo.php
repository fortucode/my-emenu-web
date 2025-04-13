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
        Schema::create('commander_combo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_com')->constrained('commande')->onDelete('cascade');
            $table->foreignId('id_combo')->constrained('combo')->onDelete('cascade');
            $table->integer('quantite');
            $table->text('precision')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commander_combo');
    }
};
