<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_providers', function (Blueprint $table) {
            $table->string('provider_id');
            $table->integer('user_id')->unsigned();
            $table->string('provider', 32);
            $table->integer('active')->default(1);
            $table->timestamps();

            $table->primary(array('provider_id'));
        });

        Schema::table('user_providers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_providers');
    }
}
