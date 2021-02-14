<?php

use Faker\Generator as Faker;
use App\Siswa;
$kelas = App\Kelas::pluck('id')->all();
// $faker = Faker::create('id_ID');
$factory->define(Siswa::class, function (Faker $faker) use($kelas) {

    	
    return [
    	'nis' => $faker->unique()->randomNumber($nbDigits = 8),
        'nama' => $faker->firstName,   
        'email' => $faker->email,   
        'tempat_lahir' => $faker->city,
        'tanggal_lahir' => $faker->dateTimeThisCentury->format('Y-m-d'),   
        'jenis_kelamin' => $faker->randomElement(['Laki-Laki', 'Perempuan']),   
        'agama' => $faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Budha']) ,   
        'alamat' => $faker->streetAddress,    
        'asal_sekolah' => $faker->randomElement(['SMPN 51 Bandung', 'SMPN 48 Bandung', 'SMPN 2 Bojongsoang
        ', 'SMPN 42 Bandung']),  
        'kelas_id' => $faker->randomElement($kelas),
       

    ];
});