<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormativeEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formative_entity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nature');
            $table->string('legal_representative');
            $table->string('ruc');
            $table->string('activity_economic');
            $table->string('mail');
            $table->string('address');
            $table->string('phone');
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
        Schema::dropIfExists('formative_entity');
    }
}
