<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'architect',
        'client',
        'terms',
        'project_type',
        'strategy',
        'project_date',
        'thumbnail',
        'details'
    ];

    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'category_id');
    }
}