@extends('layouts.app')

@section('title', 'Add Teacher')
@section('page-title', 'Add New Teacher')

@section('content')

<form action="{{ route('teachers.store') }}" method="POST">
    @csrf

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        
        <!-- Left Column -->
        <div>
            <h4 style="margin-bottom: 15px;">Basic Information</h4>
            
            <div style="margin-bottom: 15px;">
                <label>Full Name *</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                @error('name') <span style="color: red;">{{ $message }}</span> @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label>Email *</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                @error('email') <span style="color: red;">{{ $message }}</span> @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label>Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                       style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Gender</label>
                <select name="gender" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                    <option value="">Select</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label>Joining Date</label>
                <input type="date" name="joining_date" value="{{ old('joining_date') }}"
                       style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
        </div>

        <!-- Right Column -->
        <div>
            <h4 style="margin-bottom: 15px;">Professional Information</h4>

            <div style="margin-bottom: 15px;">
                <label>Qualification</label>
                <input type="text" name="qualification" value="{{ old('qualification') }}"
                       placeholder="e.g., MSc, BEd, PhD"
                       style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Specialization</label>
                <input type="text" name="specialization" value="{{ old('specialization') }}"
                       placeholder="e.g., Mathematics, Physics, Computer Science"
                       style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Experience (Years)</label>
                <input type="number" name="experience_years" value="{{ old('experience_years', 0) }}"
                       style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Address</label>
                <textarea name="address" rows="4" 
                          style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">{{ old('address') }}</textarea>
            </div>
        </div>
    </div>

    <div style="margin-top: 20px; text-align: center;">
        <button type="submit" 
                style="background: #27ae60; color: white; padding: 10px 30px; border: none; border-radius: 5px; cursor: pointer;">
            💾 Save Teacher
        </button>
        <a href="{{ route('teachers.index') }}" 
           style="background: #95a5a6; color: white; padding: 10px 30px; text-decoration: none; border-radius: 5px; margin-left: 10px;">
            Cancel
        </a>
    </div>
</form>

@endsection
