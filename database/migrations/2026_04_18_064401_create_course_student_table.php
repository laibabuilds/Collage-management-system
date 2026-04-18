<?php 
 
use Illuminate\Database\Migrations\Migration; 
use Illuminate\Database\Schema\Blueprint; 
use Illuminate\Support\Facades\Schema; 
 
return new class extends Migration 
{ 
    public function up(): void 
    { 
        Schema::create('course_student', function (Blueprint $table) { 
            $table->id(); 
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('student_id')->constrained()->onDelete('cascade'); 
            $table->date('enrollment_date')->nullable(); 
            $table->enum('status', ['enrolled', 'completed', 'dropped'])->default('enrolled'); 
            $table->integer('grade')->nullable();  // 0-100 
            $table->timestamps(); 
             
            // Prevent duplicate enrollment 
            $table->unique(['course_id', 'student_id']); 
        }); 
    } 
 
    public function down(): void 
    { 
        Schema::dropIfExists('course_student'); 
    } 
};