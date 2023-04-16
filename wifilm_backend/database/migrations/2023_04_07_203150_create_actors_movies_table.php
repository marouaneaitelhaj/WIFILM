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
        Schema::create('actors_movies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actors_id');
            $table->unsignedBigInteger('movies_id');
            $table->foreign('actors_id')->references('id')->on('actors');
            $table->foreign('movies_id')->references('id')->on('movies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actors_movies');
    }
};
