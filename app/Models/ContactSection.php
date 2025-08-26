<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'email',
        'phone',
        'address',
        'github_url',
        'linkedin_url',
        'twitter_url',
        'instagram_url',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
