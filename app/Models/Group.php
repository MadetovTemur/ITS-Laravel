<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\{GroupStudents, Subject, Teacher};


class Group extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'groups';
    

    public $timestamps = true;

    protected $guarded = ['id'];

    protected $casts = [
        'status' => \App\Enums\GroupStatus::class
    ];

    protected $hidden = [
      'uuid', 'updated_at', 'deleted_at'
    ];


    public function students()
    {
        return $this->hasMany(GroupStudents::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
