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
        Schema::create('combo', function (Blueprint $table) {
            $table->id('id_combo');
            $table->string('nom_combo');
            $table->text('desc_combo');
            $table->decimal('prix_special', 8, 2);
            $table->unsignedBigInteger('id_restaurant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combo');
    }
};
