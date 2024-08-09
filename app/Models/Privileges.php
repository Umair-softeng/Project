<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privileges extends Model
{
    use HasFactory;
    protected $primaryKey = 'privilegeID';
    protected $table = 'privileges';
    protected $fillable = [];

    public function role(){
        return $this->belongsToMany('App\Models\Role', 'rolePrivilege', 'privilegeID', 'roleID');
    }

    public function modules(){
        return $this->belongsTo('App\Models\Module', 'moduleID', 'moduleID');
    }

    public function role_privilege(){
        return $this->hasMany('App\Models\RolePrivileges', 'privilegeID', 'privilegeID');
    }

    public function accessLevel(){
        return $this->belongsTo('App\Models\AccessLevel', 'accessLevelID', 'accessLevelID');
    }
}
