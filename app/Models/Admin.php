<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'last_login_at',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
