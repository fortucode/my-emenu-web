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
        Schema::create('profil', function (Blueprint $table) {
            $table->id('id_profil');
            $table->string('type_cuisine', 200);
            $table->json('horaire'); // Les horaires stockés en JSON.
            $table->string('photo');
            $table->text('description');
            $table->foreignId('id_restaurant')->constrained('restaurant')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil');
    }
};
