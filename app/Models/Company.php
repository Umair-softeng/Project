<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company';
    protected $primaryKey = 'companyID';
    protected $fillable = [];

    public function companyType(){
        return $this->belongsTo('App\Models\CompanyType', 'companyTypeID', 'companyTypeID');
    }
}
