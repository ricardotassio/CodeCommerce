<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent;
use CodeCommerce\Product;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        factory('CodeCommerce\Product',10)->create();

    }
}
