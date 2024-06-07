<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Subject;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "teachers";

    protected $guard = 'teacher';

    protected $hidden = [
      'password', 'updated_at', 'deleted_at', 'remember_token'
    ];

    public $timestamps = true;
    
    protected $guarded = ['id'];


    public function subjects()
    {
      return $this->belongsToMany(Subject::class, 'teacher_subjects');
    }
    
}
