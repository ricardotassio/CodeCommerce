<?php

namespace CodeCommerce\Providers;

use Illuminate\Support\ServiceProvider;

class CodeCommerceServiceProvider extends ServiceProvider
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
           \CodeCommerce\Services\Product\Contracts\ProductImageServiceInterface::class,
           \CodeCommerce\Services\Product\ProductImageService::class
        );

        $this->app->bind(
            \CodeCommerce\Services\Product\Contracts\ProductServiceInterface::class,
            \CodeCommerce\Services\Product\ProductService::class
        );

    }
}
