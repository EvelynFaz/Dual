<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectPlanBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_plan_business', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('analysis');
            $table->string('objective');
            $table->string('description');
            $table->string('indicator');
            $table->string('measurement');
            $table->string('goal');
            $table->string('data_source');
            $table->string('budget');
            $table->string('expected_benefits');
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
        Schema::dropIfExists('project_plan_business');
    }
}
