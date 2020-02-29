<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GroupsSeeder::class,
            DepartmentsSeeder::class,
            SubDepartmentsSeeder::class,
            TeamsSeeder::class,
            EmployeesSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CBPSeeder::class,
            CBPSubtaskSeeder::class

        ]);
        factory(\App\Task::class,10)->create();
        factory(\App\ShareInformation::class,10)->create();
        factory(\App\Mission::class,1)->create();
        factory(\App\Remark::class,10)->create();
    }
}
