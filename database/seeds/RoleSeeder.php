<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'role' => 'Chairman',
            ],
            [
                'role' => 'MD',
            ],
            [
                'role' => 'ED',
            ],
            [
                'role' => 'D',
            ],
            [
                'role' => 'HOD',
            ],
            [
                'role'=>'Stuff',
            ]
        ];
        DB::table('roles')->insert($roles);
    }
}
