<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // サイト管理者
        Gate::define('system-only', function ($user) {
          return ($user->division == 2);
        });
        // 施設管理者
        Gate::define('admin-higher', function ($user) {
          return ($user->division == 1);
        });
        //通常ユーザー
        Gate::define('user-higher', function ($user) {
          return ($user->division == 0);
        });
    }
}
