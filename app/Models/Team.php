<?php
// app/Models/Team.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'designation',
        'position_level',
        'qualifications',
        'responsibilities',
        'image',
        'order',
        'is_active'
    ];

    protected $casts = [
        'qualifications' => 'array',
        'is_active' => 'boolean'
    ];

    // Position level constants
    const LEVEL_FOUNDER = 'founder';
    const LEVEL_SENIOR_ADVISOR = 'senior_advisor';
    const LEVEL_PRINCIPAL_ARCHITECT = 'principal_architect';
    const LEVEL_ASSOCIATE_ARCHITECT = 'associate_architect';
    const LEVEL_STRUCTURAL_ENGINEER = 'structural_engineer';
    const LEVEL_CIVIL_ENGINEER = 'civil_engineer';
    const LEVEL_MECHANICAL_ENGINEER = 'mechanical_engineer';
    const LEVEL_MANAGEMENT = 'management';
    const LEVEL_OPERATION = 'operation';

    public static function getPositionLevels()
    {
        return [
            self::LEVEL_FOUNDER => 'Founder & CEO',
            self::LEVEL_SENIOR_ADVISOR => 'Senior Advisor',
            self::LEVEL_PRINCIPAL_ARCHITECT => 'Principal Architect',
            self::LEVEL_ASSOCIATE_ARCHITECT => 'Associate Architects',
            self::LEVEL_STRUCTURAL_ENGINEER => 'Structural Engineers',
            self::LEVEL_CIVIL_ENGINEER => 'Civil Engineers',
            self::LEVEL_MECHANICAL_ENGINEER => 'Mechanical Engineers',
            self::LEVEL_MANAGEMENT => 'Management Team',
            self::LEVEL_OPERATION => 'Operation Team',
        ];
    }

    public function getQualificationsArrayAttribute()
    {
        if (is_array($this->qualifications)) {
            return $this->qualifications;
        }
        
        return $this->qualifications ? explode(',', $this->qualifications) : [];
    }


public function getImageUrlAttribute()
{
    // If image exists, generate URL from public/images/team
    return $this->image ? asset('images/team/' . $this->image) : null;
}

}