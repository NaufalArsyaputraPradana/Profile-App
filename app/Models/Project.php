<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'thumbnail',
        'gallery',
        'role',
        'category',
        'technologies',
        'features',
        'github_url',
        'demo_url',
        'url',
        'status',
        'year',
        'duration',
        'featured',
        'sort_order',
    ];

    protected $casts = [
        'technologies' => 'array',
        'gallery' => 'array',
        'features' => 'array',
        'featured' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Helper: get thumbnail or image
    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            return \Storage::url($this->thumbnail);
        }
        if ($this->image) {
            return \Storage::url($this->image);
        }
        return null;
    }
}
