<?php

use Illuminate\Database\Seeder;
use CodeCommerce\Entities\Tag;
use Illuminate\Database\Eloquent\Model;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();
        factory('CodeCommerce\Entities\Tag',10)->create();
    }
}
