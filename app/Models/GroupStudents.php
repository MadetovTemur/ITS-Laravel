<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupStudents extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'group_students';

    public $timestamps = true;

    protected $fillable = [
        'group_id', 'student_id', 'start_at', 'finish_at', 'status'
    ];

    protected $casts = [
        // 'start_at' => 'datetime:Y-m-d',
        'status' => \App\Enums\StudentStatus::class
    ];



    public function status_name()
    {
        return $this->status;
    }

}
