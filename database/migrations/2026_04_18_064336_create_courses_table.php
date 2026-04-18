<?php 
 
use Illuminate\Database\Migrations\Migration; 
use Illuminate\Database\Schema\Blueprint; 
use Illuminate\Support\Facades\Schema; 
 
return new class extends Migration 
{ 
    public function up(): void 
    { 
        Schema::create('courses', function (Blueprint $table) { 
            $table->id(); 
            $table->string('name'); 
            $table->string('code')->unique();  // e.g., CS101, MATH201 
            $table->text('description')->nullable(); 
            $table->integer('credits')->default(3);  // 1-6 credits 
            $table->integer('duration_hours')->nullable();  // Total hours 
            $table->enum('status', ['active', 'inactive'])->default('active'); 
             
            // Foreign key for One-to-Many (Teacher) 
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->onDelete('set null'); 
             
            $table->timestamps(); 
        }); 
    } 
 
    public function down(): void 
    { 
        Schema::dropIfExists('courses'); 
    } 
};