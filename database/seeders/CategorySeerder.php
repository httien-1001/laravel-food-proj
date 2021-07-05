<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CategorySeerder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_models')->insert([
            'name' =>'Cơm',
            'img' => '/rice.img',
            'users_id' => 1
        ]);
    }
}
