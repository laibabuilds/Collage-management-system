<?php 
 
namespace App\Models; 
 
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
 
class StudentProfile extends Model 
{ 
    protected $fillable = [ 
        'student_id', 'address', 'father_name', 'mother_name',  
        'emergency_contact', 'blood_group', 'profile_picture' 
    ]; 
 
    // Inverse of One-to-One 
    public function student(): BelongsTo 
    { 
        return $this->belongsTo(Student::class); 
    } 
}