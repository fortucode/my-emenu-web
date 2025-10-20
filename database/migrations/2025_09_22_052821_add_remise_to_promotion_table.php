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
        Schema::table('promotion', function (Blueprint $table) {
            // Ajouter le type de remise : 'percent' ou 'fixed'
            $table->enum('type_remise', ['percent', 'fixed'])
                  ->after('date_fin')
                  ->default('percent');

            // Ajouter la valeur de la remise
            $table->decimal('remise', 10, 2)
                  ->after('type_remise')
                  ->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promotion', function (Blueprint $table) {
            $table->dropColumn(['type_remise', 'remise']);
        });
    }
};