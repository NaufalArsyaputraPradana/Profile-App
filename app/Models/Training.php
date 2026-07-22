<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'organizer',
        'category',
        'start_date',
        'end_date',
        'duration',
        'location',
        'description',
        'topics',
        'certificate_image',
        'badge_image',
        'cover_image',
        'credential_url',
        'featured',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'topics' => 'array',
        'featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderByDesc('start_date');
    }
}
