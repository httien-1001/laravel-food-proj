<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles_models')->insert([
            ['name' => 'Admin'],
            ['name' => 'Customer']
        ]);
    }
}
