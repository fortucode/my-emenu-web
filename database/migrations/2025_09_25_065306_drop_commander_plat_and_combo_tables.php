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
    Schema::dropIfExists('commander_plat');
    Schema::dropIfExists('commander_combo');
}
public function down(): void
{
    // Tu peux remettre la structure si besoin
}
};
