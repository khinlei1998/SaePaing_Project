<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mission;
use Faker\Generator as Faker;
//protected $fillable = ['job_type','job_target',
//'job_obj','jobfinished_date',
//'doing_methods','attach_files','issue_resolve_ways',
//'status','remark','emp_id'];

$factory->define(App\Mission::class, function (Faker $faker) {
    $responsible_persion = \App\Employee::inRandomOrder()->first()->emp_id;
    return [
        'job_type'=>$faker->title,
        'job_target'=>$faker->sentence(10,true),
        'job_obj'=>$faker->paragraph(2,true),
        'jobfinished_date'=>$faker->dateTime,
        'doing_methods'=>rtrim($faker->sentence(rand(5,10)),'.'),
        'attach_files'=>$faker->image('public/images',400,300),
        'status'=>rand(0,2),
        'issue_resolve_ways'=>$faker->paragraph(2,true),
        'remark'=>$faker->paragraph(2,true),
        'emp_id'=>$responsible_persion
    ];
});

