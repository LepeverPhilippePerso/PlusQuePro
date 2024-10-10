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
            $table->id();
            $table->timestamps();

            $table->bigInteger('themoviedb_id')->unsigned()->unique();
            $table->string('title');
            $table->string('backdrop_path')->nullable();
            $table->string('original_title');
            $table->longText('overview');
            $table->string('poster_path')->nullable();
            $table->string('media_type');
            $table->boolean('adult');
            $table->char('original_language', 2);
            $table->integer('popularity')->unsigned();
            $table->date('release_date')->nullable();
            $table->boolean('video')->nullable();
            $table->decimal('vote_average', 4, 3)->unsigned();
            $table->integer('vote_count')->unsigned();
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
