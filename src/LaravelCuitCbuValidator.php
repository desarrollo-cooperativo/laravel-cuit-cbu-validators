<?php

namespace Cardumen\CuitCbuValidator;

use Illuminate\Support\ServiceProvider;

class LaravelCuitCbuValidator extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
           require(__DIR__."/rules/Cuit.php");
            
           require(__DIR__."/rules/Cbu.php");        
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
