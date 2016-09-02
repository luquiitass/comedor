<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use \App\Estado_usuario;
use \App\Observers\AuditoriaObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Estado_usuario::Observe(AuditoriaObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('path.public', function() {
            return /*base_path().'/public_html*/'';
        });

    }
}
