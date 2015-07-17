<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent;
use CodeCommerce\Products;


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

        factory('CodeCommerce\Products',10)->create();

    }
}
