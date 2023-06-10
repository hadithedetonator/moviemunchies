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
        Schema::create('movie_directed', function (Blueprint $table) {
            $table->id();
            $table->unsignedbiginteger('director_id');
            $table->foreign('director_id')->references('director_id')->on('directors')->onDelete('cascade');
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
        Schema::dropIfExists('movie_directed');
    }
};
