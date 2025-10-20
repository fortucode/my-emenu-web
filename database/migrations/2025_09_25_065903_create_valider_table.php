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
    Schema::create('valider', function (Blueprint $table) {
        $table->id();

        // clé étrangère vers commande (obligatoire)
        $table->foreignId('id_com')->constrained('commande')->onDelete('cascade');

        // clés étrangères optionnelles
        $table->foreignId('id_plat')->nullable()->constrained('plat')->onDelete('cascade');
        $table->foreignId('id_combo')->nullable()->constrained('combo')->onDelete('cascade');

        // attributs de la ligne de commande
        $table->integer('quantite')->default(1);
        $table->text('precision')->nullable();

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valider');
    }
};
