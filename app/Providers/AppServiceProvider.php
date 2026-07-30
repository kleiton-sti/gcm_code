<?php

namespace App\Providers;

use App\Models\User;
use App\View\UserComposer;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         View::composer('*', UserComposer::class);

         Gate::define('terceirizado-nao-pode', function (User $user) {
            return $user->tipo == 'terceirizado'? false : true;
        });

          Gate::define('semob-nao-pode', function (User $user) {
            return $user->tipo == 'semob'? false : true;
        });



    }
}
