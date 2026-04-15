@extends('layouts.app')

@section('title', 'Teacher Details')
@section('page-title', 'Teacher Details: ' . $teacher->name)

@section('content')

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
    
    <!-- Basic Information Card -->
    <div style="border: 1px solid #ddd; border-radius: 8px; padding: 20px;">
        <h4 style="margin-bottom: 15px; color: #2c3e50;">📋 Basic Information</h4>
        <table style="width: 100%;">
            <tr><td style="padding: 8px 0;"><strong>ID:</strong></td><td>{{ $teacher->id }}</td></tr>
            <tr><td style="padding: 8px 0;"><strong>Name:</strong></td><td>{{ $teacher->name }}</td></tr>
            <tr><td style="padding: 8px 0;"><strong>Email:</strong></td><td>{{ $teacher->email }}</td></tr>
            <tr><td style="padding: 8px 0;"><strong>Phone:</strong></td><td>{{ $teacher->phone ?? '-' }}</td></tr>
            <tr><td style="padding: 8px 0;"><strong>Gender:</strong></td><td>{{ ucfirst($teacher->gender ?? '-') }}</td></tr>
            <tr><td style="padding: 8px 0;"><strong>Joining Date:</strong></td><td>{{ $teacher->joining_date ?? '-' }}</td></tr>
        </table>
    </div>

    <!-- Professional Information Card -->
    <div style="border: 1px solid #ddd; border-radius: 8px; padding: 20px;">
        <h4 style="margin-bottom: 15px; color: #2c3e50;">🎓 Professional Information</h4>
        <table style="width: 100%;">
            <tr><td style="padding: 8px 0;"><strong>Qualification:</strong></td><td>{{ $teacher->qualification ?? '-' }}</td></tr>
            <tr><td style="padding: 8px 0;"><strong>Specialization:</strong></td><td>{{ $teacher->specialization ?? '-' }}</td></tr>
            <tr><td style="padding: 8px 0;"><strong>Experience:</strong></td><td>{{ $teacher->experience_years }} years</td></tr>
            <tr><td style="padding: 8px 0;"><strong>Address:</strong></td><td>{{ $teacher->address ?? '-' }}</td></tr>
        </table>
    </div>
</div>

<!-- Courses Taught Section -->
<div style="margin-top: 20px; border: 1px solid #ddd; border-radius: 8px; padding: 20px;">
    <h4 style="margin-bottom: 15px; color: #2c3e50;">📚 Courses Taught by {{ $teacher->name }}</h4>
    
    @if($teacher->courses && $teacher->courses->count() > 0)
        <table border="1" width="100%" cellpadding="10" style="border-collapse: collapse;">
            <thead style="background: #ecf0f1;">
                <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Credits</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teacher->courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->code ?? '-' }}</td>
                    <td>{{ $course->credits ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="color: gray;">No courses assigned to this teacher yet.</p>
    @endif
</div>

<div style="margin-top: 20px; text-align: center;">
    <a href="{{ route('teachers.edit', $teacher->id) }}" 
       style="background: #f39c12; color: white; padding: 10px 30px; text-decoration: none; border-radius: 5px;">
        ✏️ Edit Teacher
    </a>
    <a href="{{ route('teachers.index') }}" 
       style="background: #95a5a6; color: white; padding: 10px 30px; text-decoration: none; border-radius: 5px; margin-left: 10px;">
        Back to List
    </a>
</div>

@endsection
