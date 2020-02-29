<?php

use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{

    public function run()
    {
        //
        $dt = now();
        $dateNow = $dt->toDateTimeString();

        $teams = [
            [
                'team_name' => 'Admin Office',
                'subdept_id'=>'1',
                'dept_id'=>'12',
                'group_id'=>'5',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'team_name' => ' Reception',
                'subdept_id'=>'2',
                'dept_id'=>'12',
                'group_id'=>'5',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'team_name' => 'Kitchen',
                'subdept_id'=>'3',
                'dept_id'=>'12',
                'group_id'=>'5',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'team_name' => 'Clean',
                'subdept_id'=>'4',
                'dept_id'=>'12',
                'group_id'=>'5',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'team_name' => 'Vehicle',
                'subdept_id'=>'5',
                'dept_id'=>'12',
                'group_id'=>'5',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'team_name' => 'Security',
                'subdept_id'=>'6',
                'dept_id'=>'12',
                'group_id'=>'5',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'team_name' => 'Meik',
                'subdept_id'=>'7',
                'dept_id'=>'12',
                'group_id'=>'5',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'team_name' => 'Kauk Myat',
                'subdept_id'=>'8',
                'dept_id'=>'12',
                'group_id'=>'5',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'team_name' => 'Naypyitaw',
                'subdept_id'=>'9',
                'dept_id'=>'12',
                'group_id'=>'5',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
        ];
        DB::table('teams')->insert($teams);
    }
}
