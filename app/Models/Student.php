<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Enums\Jender;

class Student extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = "students";

  protected $guard = 'student';

  protected $hidden = [
    'password',
    'remember_token',
    'updated_at',
    'deleted_at'
  ];

  public $timestamps = true;

  protected $guarded = ['id'];

  protected $casts = [
    'jender' => Jender::class
  ];


  public function full_name(): string
  {
    return $this->first_name . " " . $this->last_name;
  }




}
