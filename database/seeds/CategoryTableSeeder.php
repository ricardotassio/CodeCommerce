<?php
/**
 * Created by PhpStorm.
 * User: ricardotassio
 * Date: 09/07/15
 * Time: 00:58
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{

    public function run(){
        DB::table('categories')->truncate();

        factory('CodeCommerce\Category',15)->create();

    }
}