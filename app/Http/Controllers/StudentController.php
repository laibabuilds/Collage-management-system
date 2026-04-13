<?php 
 
namespace App\Http\Controllers; 
 
use App\Models\Student; 
use App\Models\StudentProfile; 
use Illuminate\Http\Request; 
 
class StudentController extends Controller 
{ 
    // Show all students (READ) 
    public function index() 
    { 
        $students = Student::with('profile')->get(); 
        return view('students.index', compact('students')); 
    } 
 
    // Show form to create new student 
    public function create() 
    { 
        return view('students.create'); 
    } 
 
    // Save new student (CREATE) 
    public function store(Request $request) 
    { 
        $validated = $request->validate([ 
            'name' => 'required|string|max:255', 
            'email' => 'required|email|unique:students', 
            'phone' => 'nullable|string', 
            'class' => 'nullable|string', 
            'dob' => 'nullable|date', 
            'gender' => 'nullable|in:male,female,other', 
            'address' => 'nullable|string', 
            'father_name' => 'nullable|string', 
            'mother_name' => 'nullable|string', 
            'emergency_contact' => 'nullable|string', 
            'blood_group' => 'nullable|string', 
        ]); 
 
        // Create Student 
        $student = Student::create([ 
            'name' => $validated['name'], 
            'email' => $validated['email'], 
            'phone' => $validated['phone'] ?? null, 
            'class' => $validated['class'] ?? null, 
            'dob' => $validated['dob'] ?? null, 
            'gender' => $validated['gender'] ?? null, 
        ]); 
 
        // Create Profile 
        StudentProfile::create([ 
            'student_id' => $student->id, 
            'address' => $validated['address'] ?? null, 
            'father_name' => $validated['father_name'] ?? null, 
            'mother_name' => $validated['mother_name'] ?? null, 
            'emergency_contact' => $validated['emergency_contact'] ?? null, 
            'blood_group' => $validated['blood_group'] ?? null, 
        ]); 
 
        return redirect()->route('students.index') 
            ->with('success', 'Student created successfully!'); 
    } 
 
    // Show single student details 
    public function show(Student $student) 
    { 
        $student->load('profile'); 
        return view('students.show', compact('student')); 
    } 
 
    // Show edit form 
    public function edit(Student $student) 
    { 
        $student->load('profile'); 
        return view('students.edit', compact('student')); 
    } 
 
    // Update student (UPDATE) 
    public function update(Request $request, Student $student) 
    { 
        $validated = $request->validate([ 
            'name' => 'required|string|max:255', 
            'email' => 'required|email|unique:students,email,' . $student->id, 
            'phone' => 'nullable|string', 
            'class' => 'nullable|string', 
            'dob' => 'nullable|date', 
            'gender' => 'nullable|in:male,female,other', 
            'address' => 'nullable|string', 
            'father_name' => 'nullable|string', 
            'mother_name' => 'nullable|string', 
            'emergency_contact' => 'nullable|string', 
            'blood_group' => 'nullable|string', 
        ]); 
 
        // Update Student 
        $student->update([ 
            'name' => $validated['name'], 
            'email' => $validated['email'], 
            'phone' => $validated['phone'] ?? null, 
            'class' => $validated['class'] ?? null, 
            'dob' => $validated['dob'] ?? null, 
            'gender' => $validated['gender'] ?? null, 
        ]); 
 
        // Update or Create Profile 
        if ($student->profile) { 
            $student->profile->update([ 
                'address' => $validated['address'] ?? null, 
                'father_name' => $validated['father_name'] ?? null, 
                'mother_name' => $validated['mother_name'] ?? null, 
                'emergency_contact' => $validated['emergency_contact'] ?? null, 
                'blood_group' => $validated['blood_group'] ?? null, 
            ]); 
        } else { 
            StudentProfile::create([ 
                'student_id' => $student->id, 
                'address' => $validated['address'] ?? null, 
                'father_name' => $validated['father_name'] ?? null, 
                'mother_name' => $validated['mother_name'] ?? null, 
                'emergency_contact' => $validated['emergency_contact'] ?? null, 
                'blood_group' => $validated['blood_group'] ?? null, 
            ]); 
        } 
 
        return redirect()->route('students.index') 
            ->with('success', 'Student updated successfully!'); 
    } 
 
    // Delete student (DELETE) 
    public function destroy(Student $student) 
    { 
        $student->delete(); 
        return redirect()->route('students.index') 
            ->with('success', 'Student deleted successfully!'); 
    } 
}