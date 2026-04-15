@extends('layouts.app')

@section('title', 'Teachers')
@section('page-title', 'Teachers Management')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h3>Teachers List</h3>
    <a href="{{ route('teachers.create') }}" 
       style="background: #2c3e50; color: white; padding: 8px 16px; text-decoration: none; border-radius: 5px;">
        ➕ Add New Teacher
    </a>
</div>

@if(session('success'))
    <div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 5px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 5px; margin-bottom: 20px;">
        {{ session('error') }}
    </div>
@endif

<table border="1" width="100%" cellpadding="12" style="border-collapse: collapse;">
    <thead style="background: #34495e; color: white;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Qualification</th>
            <th>Specialization</th>
            <th>Experience</th>
            <th>Courses Count</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($teachers as $teacher)
        <tr>
            <td>{{ $teacher->id }}</td>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->qualification ?? '-' }}</td>
            <td>{{ $teacher->specialization ?? '-' }}</td>
            <td>{{ $teacher->experience_years }} years</td>
            <td style="text-align: center;">
                <span style="background: #3498db; color: white; padding: 2px 8px; border-radius: 12px;">
                   
                </span>
            </td>
            <td>
                <a href="{{ route('teachers.show', $teacher->id) }}" 
                   style="color: blue; margin-right: 10px;">👁️ View</a>
                <a href="{{ route('teachers.edit', $teacher->id) }}" 
                   style="color: orange; margin-right: 10px;">✏️ Edit</a>
                <form action="{{ route('teachers.destroy', $teacher->id) }}" 
                      method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            style="background: none; border: none; color: red; cursor: pointer;"
                            onclick="return confirm('Are you sure you want to delete this teacher?')">
                        🗑️ Delete
                    </button>
                </form>
             </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" style="text-align: center; padding: 40px;">
                No teachers found! Click "Add New Teacher" to create one.
             </td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
