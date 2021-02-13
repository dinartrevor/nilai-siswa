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

         factory(Siswa::class, 95)->create()->each(function ($categories) {
        });
    }
}
