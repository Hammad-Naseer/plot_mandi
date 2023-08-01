<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;

class DefaultRoleInsertionSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // $faker = Faker::create();
        // $user = new User;
        // $records = [];
        // for ($i = 0; $i < 10; $i++) {
        //     $records[] = [
        //         'name' => $faker->name,
        //         'email' => $faker->email,
        //         'email_verified_at' => $faker->date,
        //         'password' => Hash::make('password@123'),
        //         'auth_type' => $faker->numberBetween(1,2),
        //         'created_at' => date("Y-m-d"),
        //     ];
        // }

        // User::insert($records);

        $roles = array(
            'Admin',
            'Location Admin',
            'Employee'
        );
        foreach($roles as $role):
            $roles_data = array(
                $role,
                1,
                $request->created_by,
                1,
                1,
            );
            DB::statement('EXECUTE [dbo].[uspinsertroles] ?, ?, ?, ?, ?', $roles_data); 
        endforeach;
    }
}
