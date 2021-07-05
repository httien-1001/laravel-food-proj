<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'admin',
            'email' => 'admin@gmai.com',
            'password' => Hash::make('123123123'),
            'phone' => '0985722967',
            'roles_models_id' => '1',
        ]);
    }
}
