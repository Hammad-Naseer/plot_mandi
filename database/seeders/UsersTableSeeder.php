<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $user = new User;
        $records = [];
        for ($i = 0; $i < 10; $i++) {
            $records[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'email_verified_at' => $faker->date,
                'password' => Hash::make('password@123'),
                'auth_type' => $faker->numberBetween(1,2),
                'created_at' => date("Y-m-d"),
            ];
        }

        User::insert($records);
    }
}
