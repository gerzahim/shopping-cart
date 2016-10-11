<?php

namespace ShopCart\Providers;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        $this->app['view']->composer('index',function($view){
            $view->title = 'Laracasts';
        });

        view()->composer(
            'app',
            'App\Http\ViewComposers\MovieComposer'
        ); */

        view()->composer('*', "ShopCart\Http\ViewComposers\SettingComposer");
        

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
