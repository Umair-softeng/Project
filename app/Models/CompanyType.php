<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyType extends Model
{
    use HasFactory;
    protected $table = 'companyType';
    protected $primaryKey = 'companyTypeID';
    protected $fillable = [];

    public function companies(){
        return $this->hasMany('App\Models\Company', 'companyTypeID', 'companyTypeID');
    }
}
