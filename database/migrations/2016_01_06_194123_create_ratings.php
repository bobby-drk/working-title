<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('movie_id')->unsigned();
            $table->integer('rating')->unsigned();
            $table->date('date_watched');
            $table->integer('directing')->unsigned();
            $table->integer('leading_actors')->unsigned();
            $table->integer('supporting_cast')->unsigned();
            $table->integer('music')->unsigned();
            
    //I think we should discuss these last three or change how they work in the futrue
            $table->integer('experience')->unsigned();
            $table->integer('mood')->unsigned();
            $table->integer('watched_with')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ratings');
    }
}
