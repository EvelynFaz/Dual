<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AcademicPeriod::class, 100)->create();
        factory(App\ActivityReportLearning::class, 100)->create();
        factory(App\Role::class, 2)->create();
        factory(App\FormativeEntity::class, 100)->create();
        factory(App\LearningReport::class, 100)->create();
        factory(App\Objective::class, 100)->create();
        factory(App\ProfilePhoto::class, 100)->create();
        factory(App\ProjectPlanBusines::class, 100)->create();
        factory(App\RotationPlan::class, 100)->create();
        factory(App\TeachingPeriod::class, 100)->create();
        factory(App\Tracing::class, 100)->create();
        factory(App\TrainingFrameworkPlan::class, 100)->create();

    }
}

