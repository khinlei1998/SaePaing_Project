<?php

use App\Employee;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'name', 'email', 'password','emp_id'
        $password = Hash::make('asd123!@#');
        $emps = Employee::all();
        foreach ($emps as $employer)
        User::create( [
            'name'=>$employer->emp_name,
            'email'=>str_replace(' ','',strtolower($employer->emp_name)).'@gmail.com',
            'password'=>$password,
            'emp_id'=>$employer->emp_id,
            'role_id'=>rand(1,6),
            'created_at'=>'2019-09-04 11:44:05',
            'updated_at'=>'2019-10-10 11:43:12'
        ] );
    }
}
