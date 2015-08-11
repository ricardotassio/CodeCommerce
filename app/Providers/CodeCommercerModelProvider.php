<?php

namespace CodeCommerce\Providers;

use Illuminate\Support\ServiceProvider;

class CodeCommercerModelProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \CodeCommerce\Entities\Contracts\ProductModelInterface::class,
            \CodeCommerce\Entities\Product::class
        );
    }
}
