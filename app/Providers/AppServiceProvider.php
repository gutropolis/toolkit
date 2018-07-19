<?php

namespace Gutropolis\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
			$this->app->bind('Gutropolis\Repositories\Contracts\PlanRepositoryInterface', 'Gutropolis\Repositories\PlansRepository');
			$this->app->bind('Gutropolis\Repositories\Contracts\PlanPackageRepositoryInterface', 'Gutropolis\Repositories\PlanPackageRepository');
    }
}
