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
        Schema::create('plat', function (Blueprint $table) {
            $table->id('id_plat');
            $table->string('nom_plat');
            $table->text('desc_plat');
            $table->decimal('prix', 8, 2); // Prix avec 2 décimales.
            $table->string('photo_plat');
            $table->foreignId('id_restaurant')->constrained('restaurant')->onDelete('cascade');
            $table->foreignId('id_cat')->constrained('category')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plat');
    }
};
