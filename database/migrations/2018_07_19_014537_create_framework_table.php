<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrameworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('framework', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('url_image');
            $table->string('site')->unique();
            $table->integer('year_creation');
            $table->string('creator');
            $table->string('latest_stable_release');
            $table->string('type');
            $table->longText('opinion');
            $table->string('pros_cons');

            $table->integer('id_language')->unsigned();
            $table->foreign('id_language')->references('id')->on('programming_language');

            $table->timestamps();
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('framework', function (Blueprint $table) {
            $table->dropForeign(['id_language']);
        });

        Schema::dropIfExists('framework');
    }
}
