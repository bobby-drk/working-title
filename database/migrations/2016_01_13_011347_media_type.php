<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MediaType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->timestamps();

            $table->softDeletes();
        });

       Schema::table('media', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('media_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('media_type');
        $table->dropForeign('media_type_id_foreign');
    }
}
