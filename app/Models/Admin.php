<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Guard imports
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable, HasApiTokens;

    protected $table = 'admins';

    protected $guard = 'admin';

    // protected $fillable = [
    //     'full_name', 'username', 'email', 'password',
    // ];

    protected $hidden = [
      'password', 'remember_token', 'deleted_at'
    ];

    public $timestamps = true;
    
    protected $guarded = ['id'];

}
