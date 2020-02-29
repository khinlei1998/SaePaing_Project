<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ShareInformation;
use Faker\Generator as Faker;

$factory->define(ShareInformation::class, function (Faker $faker) {
    $share_to = \App\Employee::inRandomOrder()->first();
    $share_by = \App\Employee::inRandomOrder()->first();
    while ($share_by==$share_to){
        $share_by = \App\Employee::inRandomOrder()->first();
    }
    return [
        'share_description'=>$faker->paragraph(2,true),
        'share_to'=>$share_to,
        'share_by'=>$share_by,
        'task_id'=>\App\Task::inRandomOrder()->first(),
    ];
});
