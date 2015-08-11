<?php

namespace CodeCommerce\Providers;

use Illuminate\Support\ServiceProvider;

class CodeCommerceRepositoryProvider extends ServiceProvider
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
            \CodeCommerce\Repositories\Product\ProductRepositoryInterface::class,
            \CodeCommerce\Repositories\Product\ProductRepositoryEloquent::class
        );
        $this->app->bind(
            \CodeCommerce\Repositories\Category\CategoryRepositoryInterface::class,
            \CodeCommerce\Repositories\Category\CategoryRepositoryEloquent::class
        );
        $this->app->bind(
            \CodeCommerce\Repositories\ProductImage\ProductImageRepositoryInterface::class,
            \CodeCommerce\Repositories\ProductImage\ProductImageRepositoryEloquent::class
        );

    }
}
