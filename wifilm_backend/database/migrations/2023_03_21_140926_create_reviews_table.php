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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movies_id');
            $table->unsignedBigInteger('users_id');
            $table->integer('review');
            $table->text('comment');
            $table->foreign('movies_id')->references('id')->on('movies');
            $table->foreign('users_id')->references('id')->on('users');
            $table->unique(['movies_id', 'users_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
