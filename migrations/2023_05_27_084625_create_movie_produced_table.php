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
        Schema::create('movie_produced', function (Blueprint $table) {
            $table->id();
            $table->unsignedbiginteger('producer_id');
            $table->foreign('producer_id')->references('producer_id')->on('producers')->onDelete('cascade');
            $table->unsignedbiginteger('movie_id');
            $table->foreign('movie_id')->references('movie_id')->on('movies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_produced');
    }
};
