<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $primaryKey = 'studentID';
    protected $fillable = ['name', 'fatherName', 'cnic', 'email', 'mobileNo', 'address', 'qualification', 'degree', 'passingYear', 'experience', 'currentlyWorking'];

}
