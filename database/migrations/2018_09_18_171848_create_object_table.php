<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('level_achievement_expected');
            $table->string('level_achievement_reached');
            $table->string('homework');
            $table->string('Post_Learning');
            $table->string('week_learning');
            $table->string('week');
            $table->string('responsible');
            $table->string('priority');
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
        Schema::dropIfExists('object');
    }
}
