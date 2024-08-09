<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model
{
    use HasFactory;
    protected $table = 'accessLevel';
    protected $primaryKey = 'accessLevelID';
    protected $fillable = [];

    public function privilege(){
        return $this->hasMany('App\Models\Privileges', 'accessLevelID', 'accessLevelID');
    }

    public function modules(){
        return $this->belongsToMany('App\Models\Module', 'privileges', 'accessLevelID', 'moduleID');
    }
}
