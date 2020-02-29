<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Remark;
use App\Task;
use Faker\Generator as Faker;

$factory->define(App\Remark::class, function (Faker $faker) {
    return [
        'remark_description'=>$faker->paragraph(3,true),
        'task_id'=>Task::inRandomOrder()->first(),
    ];
});
