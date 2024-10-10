<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    use HasFactory;
    protected $table = 'text';
    protected $primaryKey = 'textID';
    protected $fillable = ['text', 'userID', 'date'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\Models\User', 'userID', 'userID');
    }
}
