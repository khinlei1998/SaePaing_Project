<?php

namespace App\Providers;

use App\Group;
use App\Mission;
use App\Policies\GroupPolicy;
use App\Policies\MissionPolicy;
use App\Policies\TaskPolicy;
use App\Policies\TeamPolicy;
use App\Policies\EmployeePolicy;
use App\Task;
use App\Team;
use App\Employee;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Task::class => TaskPolicy::class,
        Mission::class=>MissionPolicy::class,
        Group::class=>GroupPolicy::class,
        Team::class=>TeamPolicy::class,
        Department::class=>DepartmentPolicy::class,
        Employee::class=>EmployeePolicy::class,
];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
