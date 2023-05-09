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
        Schema::dropIfExists('games');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name_game');
            $table->text('discription_game');
            $table->string('icon_game');
            $table->string('Price')->nullable();
            $table->timestamps();
        });
    }
};
