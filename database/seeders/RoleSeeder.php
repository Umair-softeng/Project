<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aryRoles = [
            ['roleID' => 1, 'roleName' => 'Company', 'description' => 'Role for Company'],
            ['roleID' => 2, 'roleName' => 'Student', 'description' => 'Role for Student'],
        ];
        foreach ($aryRoles as $role) {
            DB::table('roles')->insert([
                'roleID' => $role['roleID'],
                'roleName' => $role['roleName'],
                'description' => $role['description']
            ]);
        }
    }
}
