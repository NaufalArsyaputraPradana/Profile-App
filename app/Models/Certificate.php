<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'issuer',
        'date',
        'certificate_number',
        'expired_date',
        'no_expiry',
        'description',
        'thumbnail',
        'file_pdf',
        'image',
        'featured',
        'status',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'date' => 'date',
        'expired_date' => 'date',
        'no_expiry' => 'boolean',
        'featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getCategoryLabelAttribute(): string
    {
        $labels = [
            'seminar' => 'Seminar',
            'workshop' => 'Workshop',
            'certification' => 'Sertifikasi',
            'training' => 'Pelatihan',
            'achievement' => 'Prestasi',
            'webinar' => 'Webinar',
            'competition' => 'Kompetisi',
        ];

        return $labels[$this->category] ?? ucfirst($this->category);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderByDesc('date');
    }

    public function scopeByCategory($query, $category)
    {
        if ($category && $category !== 'all') {
            return $query->where('category', $category);
        }
        return $query;
    }
}
