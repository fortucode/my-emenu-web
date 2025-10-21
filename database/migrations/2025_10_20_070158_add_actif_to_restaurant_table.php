<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('restaurant', function (Blueprint $table) {
        $table->boolean('actif')->default(true)->after('id');
    });
}

public function down()
{
    Schema::table('restaurant', function (Blueprint $table) {
        $table->dropColumn('actif');
    });
}
};
