<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArtistAndPiece extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('artists_genres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('artist_id')->unsigned();
            $table->integer('genre_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('artists_genres', function (Blueprint $table) {
            $table->foreign('artist_id')->references('id')->on('artists')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('pieces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('artist_id')->unsigned();
            $table->integer('genre_id')->unsigned();
            $table->string('title')->unique();
            $table->string('type');
            $table->boolean('hasVideoId')->default(false);
            $table->timestamps();
        });

        Schema::table('pieces', function (Blueprint $table) {
           $table->foreign('artist_id')->references('id')->on('artists')
               ->onUpdate('cascade')->onDelete('cascade');
           $table->foreign('genre_id')->references('id')->on('genres')
               ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pieces', function (Blueprint $table) {
            $table->dropForeign('pieces_genre_id_foreign');
            $table->dropForeign('pieces_artist_id_foreign');
        });
        Schema::dropIfExists('pieces');
        Schema::table('artists_genres', function (Blueprint $table) {
            $table->dropForeign('artists_genres_artist_id_foreign');
            $table->dropForeign('artists_genres_genre_id_foreign');
        });
        Schema::dropIfExists('artists_genres');
        Schema::dropIfExists('artists');
    }
}
