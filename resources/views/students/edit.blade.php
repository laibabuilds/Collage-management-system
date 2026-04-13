@extends('layouts.app') 
 
@section('title', 'Edit Student') 
@section('page-title', 'Edit Student: ' . $student->name) 
 
@section('content') 
 
<form action="{{ route('students.update', $student->id) }}" method="POST"> 
    @csrf 
    @method('PUT') 
     
    <label>Name:</label> 
    <input type="text" name="name" value="{{ $student->name }}" required><br><br> 
     
    <label>Email:</label> 
    <input type="email" name="email" value="{{ $student->email }}" required><br><br> 
     
    <label>Phone:</label> 
    <input type="text" name="phone" value="{{ $student->phone }}"><br><br> 
     
    <label>Class:</label> 
    <input type="text" name="class" value="{{ $student->class }}"><br><br> 
     
    <label>Father Name:</label> 
    <input type="text" name="father_name" value="{{ $student->profile->father_name ?? '' 
}}"><br><br> 
     
    <label>Address:</label> 
    <textarea name="address">{{ $student->profile->address ?? '' }}</textarea><br><br> 
     
    <button type="submit">Update Student</button> 
    <a href="{{ route('students.index') }}">Cancel</a> 
</form> 
 
@endsection