<?php

use Illuminate\Database\Seeder;

class SubDepartmentsSeeder extends Seeder
{
    public function run()
    {
        //
        $dt = now();
        $dateNow = $dt->toDateTimeString();

        $subdepts = [
            [
                'subdept_name' => 'Admin Office',
                'dept_id'=>'12',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'subdept_name' => 'Reception',
                'dept_id'=>'12',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'subdept_name' => 'Kitchen',
                'dept_id'=>'12',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'subdept_name' => 'Clean',
                'dept_id'=>'12',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'subdept_name' => 'Vehicle',
                'dept_id'=>'12',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'subdept_name' => 'Security',
                'dept_id'=>'12',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'subdept_name' => 'Meik',
                'dept_id'=>'12',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'subdept_name' => 'Kauk Myat',
                'dept_id'=>'12',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'subdept_name' => 'Naypyitaw',
                'dept_id'=>'12',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
        ];
        DB::table('sub_departments')->insert($subdepts);
    }
}
