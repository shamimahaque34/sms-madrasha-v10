<?php

namespace App\Providers;

use App\Models\Backend\Settings;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Schema::defaultStringLength(191);
        View::composer('backend.master', function ($view){
            $view->with('backendSetting', Settings::first());
        });
        View::composer('backend.auth-master', function ($view){
            $view->with('backendSetting', Settings::first());
        });
    }
}
