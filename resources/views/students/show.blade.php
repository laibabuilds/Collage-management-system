@extends('layouts.app')
@section('title', 'Student Details')
@section('page-title', 'Student Details')
@section('content')
<p><strong>Name:</strong> {{ $student->name }}</p>
<p><strong>Email:</strong> {{ $student->email }}</p>
<p><strong>Phone:</strong> {{ $student->phone ?? '-' }}</p>
<p><strong>Class:</strong> {{ $student->class ?? '-' }}</p>
<p><strong>Father Name:</strong> {{ $student->profile->father_name ?? '-' }}</p>
<p><strong>Address:</strong> {{ $student->profile->address ?? '-' }}</p>
<a href="{{ route('students.edit', $student->id) }}">Edit</a>
<a href="{{ route('students.index') }}">Back</a>
@endsection