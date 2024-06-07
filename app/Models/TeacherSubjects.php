<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TeacherSubjects extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = "teacher_subjects";


    public $timestamps = true;
    
    protected $guarded = ['id'];
}
