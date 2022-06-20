<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //map between eloquent and ProjectPolicy example
        //'App\Project' => 'App\Policies\PolicyProject',
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    //If I want expect admin from authentication
    public function boot(Gate $gate)
    {
        $this->registerPolicies();

        /*
        $gate->before(function($user)){
            return $user->id==2;
        });
        */
    }
}
