<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'thumbnail',
        'tags',
        'is_published',
        'publish_date',
    ];

    protected $casts = [
        'publish_date' => 'datetime',
        'is_published' => 'boolean',
    ];

    // Blog belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Scope for published blogs
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    // Scope for unpublished blogs
    public function scopeUnpublished($query)
    {
        return $query->where('is_published', false);
    }
}