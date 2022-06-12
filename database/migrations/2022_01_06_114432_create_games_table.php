<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('image')->nullable();
            $table->longText('desc');
            $table->bigInteger('price');
            $table->unsignedbigInteger('genre');
            $table->bigInteger('PEGI_rating');
            $table->foreign('genre')->references('id')->on('game_genres')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
