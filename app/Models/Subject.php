<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Subject extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "subjects";

    public $timestamps = true;

    protected $guarded = ['id'];

    protected $casts = [
      'created_at'=> 'datetime',
      'updated_at'=> 'datetime',
    ];

    
    protected $hidden = [
      'updated_at', 'deleted_at'
    ];
}
