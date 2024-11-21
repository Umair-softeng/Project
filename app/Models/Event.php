<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event';
    protected $primaryKey = 'eventID';
    protected $fillable = ['label','startDate', 'endDate', 'eventUrl', 'location', 'description'];
    public $timestamps = false;
}
