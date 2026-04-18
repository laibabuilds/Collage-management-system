<?php 
 
namespace App\Models; 
 
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\Relations\BelongsToMany; 
 
class Course extends Model 
{ 
    protected $fillable = [ 
        'name', 'code', 'description', 'credits',  
        'duration_hours', 'status', 'teacher_id' 
    ]; 
 
    // One-to-Many (Inverse): Course belongs to one teacher 
    public function teacher(): BelongsTo 
    { 
        return $this->belongsTo(Teacher::class); 
    } 
 
    // Many-to-Many: Course has many students 
    public function students(): BelongsToMany 
    { 
        return $this->belongsToMany(Student::class, 'course_student') 
                    ->withPivot('enrollment_date', 'status', 'grade') 
                    ->withTimestamps(); 
    } 
 
    // Accessor: Get enrolled students count 
    public function getEnrolledCountAttribute() 
    { 
        return $this->students()->count(); 
    } 
 
    // Scope: Get active courses only 
    public function scopeActive($query) 
    { 
        return $query->where('status', 'active'); 
    } 
}