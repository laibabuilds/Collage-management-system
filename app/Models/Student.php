<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'class',
        'dob',
        'gender'
    ];

    // One-to-One: Student has one profile 
    public function profile(): HasOne
    {
        return $this->hasOne(StudentProfile::class);
    }

    // Many-to-Many: Student belongs to many courses (will use later) 
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_student');
    }
}
