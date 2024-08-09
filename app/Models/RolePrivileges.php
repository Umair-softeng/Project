<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePrivileges extends Model
{
    use HasFactory;
    protected $primaryKey = 'rolePrivilegeID';
    protected $table = 'rolePrivilege';
    protected $fillable = [];

    public function role(){
        return $this->belongsTo('App\Models\Role', 'roleID', 'roleID');
    }

    public function privilege(){
        return $this->belongsTo('App\Models\Privileges', 'privilegeID', 'privilegeID');
    }
}
