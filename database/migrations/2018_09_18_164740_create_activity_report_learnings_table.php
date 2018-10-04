<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityReportLearningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_report_learnings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('description');
            $table->string('type');
            $table->string('date');
            $table->string('hour_income');
            $table->string('departure_time');
            $table->string('hours_total');
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
        Schema::dropIfExists('activity_report_learning');
    }
}
