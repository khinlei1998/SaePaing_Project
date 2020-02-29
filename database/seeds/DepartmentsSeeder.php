<?php

use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{

    public function run()
    {
        $dt = now();
        $dateNow = $dt->toDateTimeString();

        $depts = [
            [
                'dept_name' => 'Chairman Office Department',
                'group_id' => '1',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'dept_name' => 'Business Development & Planning Department',
                'group_id' => '1',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'dept_name' => 'Project Development Department',
                'group_id' => '1',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'dept_name' => 'Project Document Department',
                'group_id' => '1',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'dept_name' => 'PR Department',
                'group_id' => '1',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'dept_name' => 'Finance Department',
                'group_id' => '2',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'dept_name' => 'Account Department',
                'group_id' => '2',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'dept_name' => 'Cash & Fixed Assets Department',
                'group_id' => '2',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],

            [
                'dept_name' => 'Sale & Marketing Department',
                'group_id' => '3',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'dept_name' => 'Project Management Department',
                'group_id' => '4',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'dept_name' => 'Logistics Department',
                'group_id' => '4',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'dept_name' => 'Mechinery Department',
                'group_id' => '4',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'dept_name' => 'Admin Department',
                'group_id' => '5',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],

            [
                'dept_name' => 'HR Department',
                'group_id' => '5',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'dept_name' => 'Monitoring & IT Support Department',
                'group_id' => '5',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ]
        ];

        DB::table('departments')->insert($depts);
    }
}
