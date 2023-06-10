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
        Schema::create('movies', function (Blueprint $table) {
            $table->id('movie_id',10);
            $table->string('title',110);
            $table->string('release_date',20);
            //  $table->unsignedbiginteger('genre_id');
            // $table->foreign('genre_id')->references('genre_id')->on('genres')->onDelete('cascade');
            $table->string('cast',600);
            //  $table->unsignedbiginteger('director_id');
            // $table->foreign('director_id')->references('director_id')->on('directors')->onDelete('cascade');
            //  $table->unsignedbiginteger('producer_id');
            // $table->foreign('producer_id')->references('producer_id')->on('producers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};