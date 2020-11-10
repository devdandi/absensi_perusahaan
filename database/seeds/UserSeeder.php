<?php

use Illuminate\Database\Seeder;
Use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        // DB::create([
        //     'name' => $faker->name,
        //     'email' => $faker->email,
        //     'password' => Hash::make('dandi129'),
        //     'dob' => Carbon::now()->timestamp,
        //     'jabatan' => 'Karyawan',
        //     'nik' => now().now().now()
        // ]);
        for($i = 0; $i < 1000; $i++)
        {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('dandi129'),
                'dob' => Carbon::now(),
                'jabatan' => 'Karyawan',
                'nik' => time().time()
            ]);
        }
    }
}
