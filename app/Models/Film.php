<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date_release',
        'preview',
        'poster'
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
