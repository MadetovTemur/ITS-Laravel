<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class LoginTeachers extends Model
{
    use HasFactory, SoftDeletes;

    
    protected $table = "login_teachers";

    public $timestamps = true;
    
    protected $guarded = ['id'];
}
