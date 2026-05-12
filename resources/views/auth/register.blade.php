<!DOCTYPE html>
<html>
<head>
    <title>Register - School Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .register-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 550px;
            padding: 40px;
        }
        .register-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background: #5a67d8;
        }
        .error {
            background: #fee;
            color: #c33;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 14px;
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        .login-link a {
            color: #667eea;
            text-decoration: none;
        }
        .info-text {
            font-size: 12px;
            color: #666;
            margin-top: 8px;
            background: #e3f2fd;
            padding: 8px;
            border-radius: 4px;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>📝 Create Account</h2>
        
        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>
            
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" required>
            </div>
            
            <div class="form-group">
                <label>Register As</label>
                <select name="role" id="role" required>
                    <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
            
            <!-- Student ID Field - Only for Student Role -->
            <div class="form-group" id="student_id_field" style="display: none;">
                <label>Select Your Student Account</label>
                <select name="student_id">
                    <option value="">-- Select Student --</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                            {{ $student->name }} ({{ $student->email }}) - Class: {{ $student->class ?? 'Not Assigned' }}
                        </option>
                    @endforeach
                </select>
                <div class="info-text">
                    ⚠️ Student must be created by Admin first. Contact admin if you don't see your name.
                </div>
            </div>
            
            <!-- Teacher ID Field - Only for Teacher Role -->
            <div class="form-group" id="teacher_id_field" style="display: none;">
                <label>Select Your Teacher Account</label>
                <select name="teacher_id">
                    <option value="">-- Select Teacher --</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->name }} ({{ $teacher->email }}) - {{ $teacher->specialization ?? 'General' }}
                        </option>
                    @endforeach
                </select>
                <div class="info-text">
                    ⚠️ Teacher must be created by Admin first. Contact admin if you don't see your name.
                </div>
            </div>
            
            <!-- Info Message for Admin -->
            <div id="admin_info" class="info-text hidden" style="background: #fff3cd; color: #856404;">
                👑 Admin account will have full access to manage everything!
            </div>
            
            <button type="submit">Register</button>
        </form>
        
        <div class="login-link">
            <a href="{{ route('login') }}">Already have an account? Login here</a>
        </div>
    </div>
    
    <script>
        const roleSelect = document.getElementById('role');
        const studentField = document.getElementById('student_id_field');
        const teacherField = document.getElementById('teacher_id_field');
        const adminInfo = document.getElementById('admin_info');
        
        function updateForm() {
            const role = roleSelect.value;
            
            // Hide all first
            studentField.style.display = 'none';
            teacherField.style.display = 'none';
            adminInfo.classList.add('hidden');
            
            if (role === 'student') {
                studentField.style.display = 'block';
            } else if (role === 'teacher') {
                teacherField.style.display = 'block';
            } else if (role === 'admin') {
                adminInfo.classList.remove('hidden');
            }
        }
        
        roleSelect.addEventListener('change', updateForm);
        updateForm(); // Call on page load
    </script>
</body>
</html>
