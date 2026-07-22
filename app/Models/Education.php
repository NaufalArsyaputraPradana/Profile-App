<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'institution_name',
        'institution_logo',
        'degree',
        'field_of_study',
        'start_date',
        'end_date',
        'is_current',
        'gpa',
        'gpa_scale',
        'location',
        'description',
        'achievements',
        'activities',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
        'is_active' => 'boolean',
        'gpa' => 'float',
        'achievements' => 'array',
        'activities' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderByDesc('start_date');
    }
}
