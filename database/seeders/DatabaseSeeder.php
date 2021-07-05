<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RolesSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategorySeerder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call([
//            RolesSeeder::class
//        ]);
//        $this->call([
//            UserSeeder::class
//        ]);
        $this->call([
            CategorySeerder::class
        ]);
    }
}
