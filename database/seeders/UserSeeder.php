<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aryUsers = [
            ['userID' => 1, 'name' => 'Muhammad Umair','email' => 'umair@gmail.com' ,'password' => \Illuminate\Support\Facades\Hash::make('umair123')],
        ];
        foreach ($aryUsers as $user) {
            DB::table('users')->insert([
                'userID' => $user['userID'],
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password']
            ]);
        }
    }
}
