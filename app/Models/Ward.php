<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $primaryKey = 'wardID';
    protected $table = 'ward';
    protected $fillable = [];

    public function employees(){
        return $this->hasMany('App\Models\Employee', 'wardID', 'wardID');
    }
}
