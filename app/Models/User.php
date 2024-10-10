<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'userID';
    protected $table = 'users';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userRoles(){
        return $this->hasMany('App\Models\UserRole', 'userID', 'userID');
    }

    public function roles(){
        return $this->belongsToMany('App\Models\Role', 'userRole', 'userID', 'roleID');
    }

    public function texts(){
        return $this->hasMany('App\Models\Text', 'userID', 'userID');
    }

    public function codes(){
        return $this->hasMany('App\Models\Code', 'userID', 'userID');
    }

}
