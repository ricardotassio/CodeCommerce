<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent;
use CodeCommerce\Entities\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();



        factory('CodeCommerce\Entities\User')->create([
            'name'=>'Ricrado Tássio',
            'email'=>'ricardotassio@gmail.com',
            'password'=>Hash::make('123456')
        ]);
    }
}
