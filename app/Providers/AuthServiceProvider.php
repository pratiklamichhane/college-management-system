<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Department;
use App\Policies\DepartmentPolicy;
use App\Policies\AssignmentPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Department::class => DepartmentPolicy::class,
        Assignment::class => AssignmentPolicy::class,
        User::class => LoginPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

    }
}
