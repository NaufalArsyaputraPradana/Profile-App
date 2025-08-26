<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'photo',
        'age',
        'email',
        'phone',
        'address',
        'cv_file',
        'is_active'
    ];

    protected $casts = [
        'age' => 'integer',
        'is_active' => 'boolean'
    ];
}
