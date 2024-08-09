<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $primaryKey = 'moduleID';
    protected $table = 'modules';
    protected $fillable = [];

    public function privilege(){
        return $this->hasMany('App\Models\Privileges', 'moduleID', 'moduleID');
    }

    public function accessLevel(){
        return $this->belongsToMany('App\Models\AccessLevel', 'privileges', 'moduleID', 'accessLevelID');
    }
}
