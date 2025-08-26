<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'technologies',
        'url'
    ];

    protected $casts = [
        'technologies' => 'array'
    ];

    public function setTechnologiesAttribute($value)
    {
        $this->attributes['technologies'] = json_encode($value);
    }

    public function getTechnologiesAttribute($value)
    {
        return json_decode($value, true);
    }
}
