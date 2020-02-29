<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;
$factory->define(App\Task::class, function (Faker $faker) {
    $emp = Employee::inRandomOrder()->first();
    while($emp->dept_id == null || $emp->user->role->role_id == '6'){
        $emp = Employee::inRandomOrder()->first();
    }
    return [
        'task_title'=>rtrim($faker->sentence(rand(5,10)),'.'),
        'description'=>$faker->paragraph(rand(3,7),true),
        'assignee_person'=>Employee::inRandomOrder()->first()->emp_id,
        'assignor_person'=>$emp->emp_id,
        'status'=>rand(0,3),
        'start_time'=>'2019-09-04 11:44:05',
        'end_time'=>'2020-01-10 11:43:12',
        'dept_id'=>$emp->dept_id,
        'subdept_id'=>$emp->subdept_id,
        'team_id'=>$emp->team_id,
    ];
});

