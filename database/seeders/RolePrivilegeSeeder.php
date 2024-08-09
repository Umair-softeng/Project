<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aryRolePrivileges = [
            ['roleID' => 1,'privilegeID' => 1],
            ['roleID' => 1,'privilegeID' => 2],
            ['roleID' => 1,'privilegeID' => 3],
            ['roleID' => 1,'privilegeID' => 4],
            ['roleID' => 1,'privilegeID' => 5],
            ['roleID' => 1,'privilegeID' => 6],
            ['roleID' => 1,'privilegeID' => 7],
            ['roleID' => 1,'privilegeID' => 8],
            ['roleID' => 1,'privilegeID' => 9],
            ['roleID' => 1,'privilegeID' => 10],
            ['roleID' => 1,'privilegeID' => 11],
            ['roleID' => 1,'privilegeID' => 12],

        ];
        foreach ($aryRolePrivileges as $rolePrivilege) {
            DB::table('rolePrivilege')->insert(
                [
                    'roleID' => $rolePrivilege['roleID'],
                    'privilegeID' => $rolePrivilege['privilegeID']
                ]
            );
        }
    }
}
