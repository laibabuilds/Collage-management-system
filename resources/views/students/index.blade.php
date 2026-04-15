@extends('layouts.app')
@section('title', 'Students')
@section('page-title', 'Students Management')
@section('content')
<div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
    <h3>Students List</h3>
    <a href="{{ route('students.create') }}" style="background: #2c3e50; color: white; padding: 
8px 16px; text-decoration: none;">+ Add Student</a>
</div>

@if(session('success'))
<div style="background: green; color: white; padding: 10px; margin-bottom: 15px;">{{
session('success') }}</div>
@endif

<table border="1" width="100%" cellpadding="10">
    <tr style="background: #34495e; color: white;">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Class</th>
        <th>Actions</th>
    </tr>
    @foreach($students as $student)
    <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->class ?? '-' }}</td>
        <td>
            <a href="{{ route('students.show', $student->id) }}">View</a>
            <a href="{{ route('students.edit', $student->id) }}">Edit</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit" onclick="return confirm('Delete?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection