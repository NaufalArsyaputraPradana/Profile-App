<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_logo',
        'company_website',
        'company_description',
        'position',
        'type',
        'location',
        'start_date',
        'end_date',
        'is_current',
        'description',
        'responsibilities',
        'achievements',
        'technologies',
        'projects_done',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
        'is_active' => 'boolean',
        'responsibilities' => 'array',
        'achievements' => 'array',
        'technologies' => 'array',
        'projects_done' => 'array',
    ];

    public function getDurationAttribute(): string
    {
        $start = $this->start_date;
        $end = $this->is_current ? now() : $this->end_date;

        if (!$start || !$end) return '';

        $months = $start->diffInMonths($end);
        $years = intval($months / 12);
        $remMonths = $months % 12;

        $parts = [];
        if ($years > 0) $parts[] = $years . ' tahun';
        if ($remMonths > 0) $parts[] = $remMonths . ' bulan';

        return implode(' ', $parts) ?: '< 1 bulan';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderByDesc('start_date');
    }
}
