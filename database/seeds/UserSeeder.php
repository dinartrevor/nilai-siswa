<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Siswa;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //  factory(Siswa::class, 95)->create()->each(function ($categories) {
        // });
        DB::table('users')->insert([
          'name' => 'admin',
          'email' => 'admin@admin.com',
          'password' => bcrypt('12345'),
          'remember_token' => str_random(60),
          'level' => 'admin'
        ]);
    }
}