<?php

use Illuminate\Support\Facades\Route;


 
use App\Http\Controllers\StudentController; 
 
// Student CRUD Routes (all 7 methods) 
// Route::resource('students', StudentController::class); 
 
// OR you can write individually: 
Route::get('/students', [StudentController::class, 'index'])->name('students.index'); 
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create'); 
Route::post('/students', [StudentController::class, 'store'])->name('students.store'); 
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show'); 
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit'); 
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update'); 
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy'); 


// Home route (your existing) 
Route::get('/', function () { 
return view('welcome'); 
});


