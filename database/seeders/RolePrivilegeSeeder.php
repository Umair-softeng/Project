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
            ['roleID' => 1,'privilegeID' => 13],
            ['roleID' => 1,'privilegeID' => 14],
            ['roleID' => 1,'privilegeID' => 15],
            ['roleID' => 1,'privilegeID' => 16],
            ['roleID' => 1,'privilegeID' => 17],
            ['roleID' => 1,'privilegeID' => 18],
            ['roleID' => 1,'privilegeID' => 19],
            ['roleID' => 1,'privilegeID' => 20],

            ['roleID' => 2,'privilegeID' => 1],
            ['roleID' => 2,'privilegeID' => 2],
            ['roleID' => 2,'privilegeID' => 3],
            ['roleID' => 2,'privilegeID' => 4],
            ['roleID' => 2,'privilegeID' => 9],
            ['roleID' => 2,'privilegeID' => 10],
            ['roleID' => 2,'privilegeID' => 11],
            ['roleID' => 2,'privilegeID' => 12],
            ['roleID' => 2,'privilegeID' => 13],
            ['roleID' => 2,'privilegeID' => 14],
            ['roleID' => 2,'privilegeID' => 15],
            ['roleID' => 2,'privilegeID' => 16],
            ['roleID' => 2,'privilegeID' => 17],
            ['roleID' => 2,'privilegeID' => 18],
            ['roleID' => 2,'privilegeID' => 19],
            ['roleID' => 2,'privilegeID' => 20],

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
