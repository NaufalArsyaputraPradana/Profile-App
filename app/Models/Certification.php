<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'issuer',
        'credential_id',
        'credential_url',
        'issue_date',
        'expiry_date',
        'no_expiry',
        'level',
        'badge_image',
        'description',
        'sort_order',
        'featured',
        'is_active',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'expiry_date' => 'date',
        'no_expiry' => 'boolean',
        'featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function isExpired(): bool
    {
        if ($this->no_expiry) return false;
        if (!$this->expiry_date) return false;
        return $this->expiry_date->isPast();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderByDesc('issue_date');
    }
}
