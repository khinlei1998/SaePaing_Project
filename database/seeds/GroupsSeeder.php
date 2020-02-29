<?php

use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    public function run()
    {

        $dt = now();
        $dateNow = $dt->toDateTimeString();

        $groups = [
            [
                'group_name' => 'Group I',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'group_name' => 'Group II',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'group_name' => 'Group III',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'group_name' => 'Group IV',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'group_name' => 'Group V',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
        ];

        DB::table('groups')->insert($groups);

    }
}
