<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    protected $table = 'code';
    protected $primaryKey = 'codeID';
    protected $fillable = ['code', 'userID', 'date'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\Models\User', 'userID', 'userID');
    }
}
