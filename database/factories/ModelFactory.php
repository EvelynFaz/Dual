<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


    $factory->define(App\User::class, function (Faker\Generator $faker) {
        static $password;
        return [
            'name' => $faker->text(rand(32, 10)),
            'user_name' => $faker->unique()->safeEmail,
            'email' => $faker->unique()->safeEmail,
            'password' => '123456',
            'api_token' => str_random(60)];
    });
    $factory->define(App\Tutor::class, function (Faker\Generator $faker) {
     return [
           'type' => $faker->text(rand(32, 10)),
           'user_id' => function (){
               return factory(App\User::class)->create()->id;
           }
         ];
    });

     $factory->define(App\Role::class, function (Faker\Generator $faker) {
        return [
            'description' => $faker->text(rand(32, 10)),
            'role' => 1,
              'user_id' => function () {
            return factory(App\User::class)->create()->id;
                }
            ];
        });

    $factory->define(App\Student::class, function (Faker\Generator $faker) {
        return [
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'user_id' => function () {
              return factory(App\User::class)->create()->id;
             }
        ];
    });

  $factory->define(App\person::class, function (Faker\Generator $faker) {
            return [
                'name' => $faker->text(rand(32, 10)),
                'identification' => $faker->text(rand(32, 10)),
                'birthday' => $faker->text(rand(32, 10)),
                'email' => $faker->text(rand(32, 10)),
                'user_id' => function () {
                    return factory(App\User::class)->create()->id;
                }
            ];
        });
$factory->define(App\TrainingFrameworPlan::class, function (Faker\Generator $faker) {
    return [
        'priority' => $faker->text(rand(32, 10)),
    ];
});

$factory->define(App\tracing::class, function (Faker\Generator $faker) {
    return [
        'career_coordinator' => $faker->text(rand(32, 10)),
        'start_date' =>$faker->text(rand(32, 10)),
        'finish_date' =>$faker->text(rand(32, 10)),
        'hours_training' =>$faker->text(rand(32, 10)),
         'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
$factory->define(App\teachingPeriod::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->text(rand(32, 10)),
        'start_date' =>$faker->text(rand(32, 10)),
        'finish_date' =>$faker->text(rand(32, 10)),
        'enrolled' =>$faker->text(rand(32, 10)),
        'code' =>$faker->text(rand(32, 10)),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});

$factory->define(App\RotationPlan::class, function (Faker\Generator $faker) {
    return [
        'theoretical_knowledge' => $faker->text(rand(32, 10)),
        'procedural_knowledge_attitudinal' =>$faker->text(rand(32, 10)),
        'knowledge' =>$faker->text(rand(32, 10)),
        'enrolled' =>$faker->text(rand(32, 10)),
        'priority' =>$faker->text(rand(32, 10)),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});

$factory->define(App\ProjectPlanBusines::class, function (Faker\Generator $faker) {
    return [
        'type' => $faker->text(rand(32, 10)),
        'analysis' =>$faker->text(rand(32, 10)),
        'objective' =>$faker->text(rand(32, 10)),
        'description' =>$faker->text(rand(32, 10)),
        'indicator' =>$faker->text(rand(32, 10)),
        'measurement' =>$faker->text(rand(32, 10)),
        'goal' =>$faker->text(rand(32, 10)),
        'data_source' =>$faker->text(rand(32, 10)),
        'budget' =>$faker->text(rand(32, 10)),
        'expected_benefits' =>$faker->text(rand(32, 10)),
        'priority' =>$faker->text(rand(32, 10)),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});

$factory->define(App\ProfilePhoto::class, function (Faker\Generator $faker) {
    return [
        'type_archive' => $faker->text(rand(32, 10)),
        'name_archive' =>$faker->text(rand(32, 10)),
        'attached' =>$faker->text(rand(32, 10)),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
$factory->define(App\Object::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->text(rand(32, 10)),
        'level_achievement_expected' =>$faker->text(rand(32, 10)),
        'level_achievement_reached' =>$faker->text(rand(32, 10)),
        'homework' => $faker->text(rand(32, 10)),
        'Post_Learning' =>$faker->text(rand(32, 10)),
        'week_learning' =>$faker->text(rand(32, 10)),
        'week' => $faker->text(rand(32, 10)),
        'responsible' =>$faker->text(rand(32, 10)),
        'priority' =>$faker->text(rand(32, 10)),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
$factory->define(App\AcademicPeriod::class, function (Faker\Generator $faker) {
    return [
        'week' => $faker->text(rand(32, 10)),
        'qualification' =>$faker->text(rand(32, 10)),
        'date_delivery' =>$faker->text(rand(32, 10)),
        'reflection' => $faker->text(rand(32, 10)),
        'observations' =>$faker->text(rand(32, 10)),
        'priority' =>$faker->text(rand(32, 10)),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
$factory->define(App\FormativeEntity::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text(rand(32, 10)),
        'nature' =>$faker->text(rand(32, 10)),
        'legal_representative' =>$faker->text(rand(32, 10)),
        'ruc' => $faker->text(rand(32, 10)),
        'activity_economic' =>$faker->text(rand(32, 10)),
        'email' =>$faker->text(rand(32, 10)),
        'address' =>$faker->text(rand(32, 10)),
        'phone' =>$faker->text(rand(32, 10)),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
$factory->define(App\ActivityReportLearning::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->text(rand(32, 10)),
        'type' =>$faker->text(rand(32, 10)),
        'date' =>$faker->text(rand(32, 10)),
        'hour_income' => $faker->text(rand(32, 10)),
        'departure_time' =>$faker->text(rand(32, 10)),
        'hours_total' =>$faker->text(rand(32, 10)),
        'priority' =>$faker->text(rand(32, 10)),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
$factory->define(App\ActivityReportLearning::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->text(rand(32, 10)),
        'type' =>$faker->text(rand(32, 10)),
        'date' =>$faker->text(rand(32, 10)),
        'hour_income' => $faker->text(rand(32, 10)),
        'departure_time' =>$faker->text(rand(32, 10)),
        'hours_total' =>$faker->text(rand(32, 10)),
        'priority' =>$faker->text(rand(32, 10)),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
$factory->define(App\AcademicPeriod::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->text(rand(32, 10)),
    ];
});



