<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // role admin
        DB::table('users')->insert([
          'name' => 'admin',
          'email' => 'admin@admin.com',
          'password' => bcrypt('12345'),
          'remember_token' => str_random(60),
          'level' => 'admin'
        ]);
    }
}
