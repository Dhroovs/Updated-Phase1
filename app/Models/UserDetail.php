<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'address',
        'gender',
        'date_of_birth',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}