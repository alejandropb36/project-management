<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('opc-adm', function ($user, $user_role)
        {
            // return $user->projects()->where('projects.id',$project->id)->first()->pivot->user_role == 'Lider';
            return $user_role == 'Lider';
        });

        // Gate::define('opc-col', function ($project_user)
        // {
        //     return $project_user->user_role == 'Colaborador';
        // });
    }
}