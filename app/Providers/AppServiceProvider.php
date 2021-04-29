<?php

namespace App\Providers;

use App\Models\Submissao;
use App\Observers\SubmissaoObserver;

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
        //Submissao::observe(SubmissaoObserver::class);
    }
}
