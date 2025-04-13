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
        Schema::table('combo', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('id_restaurant')->after('id_combo');

            //$table->foreign('id_restaurant')->references('id')->on('restaurants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('combo', function (Blueprint $table) {
            //

            $table->dropForeign(['id_restaurant']);
            $table->dropColumn('id_restaurant');
        });
    }
};
