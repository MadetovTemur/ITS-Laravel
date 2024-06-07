<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class LoginStudents extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = "login_students";


    public $timestamps = true;
    
    protected $guarded = ['id'];
}
