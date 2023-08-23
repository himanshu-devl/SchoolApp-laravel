@extends('layouts.app')

@section('content')
    <div class="edit-user-container">
        <h1>Edit User</h1>

        <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ $user->username }}">

            <label for="new_email">New Email:</label>
            <input type="text" id="new_email" name="email" value="{{ $user->email }}">

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="password" value="{{ $user->password }}">

            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="teacher" {{ $user->role === 'teacher' ? 'selected' : '' }}>Teacher</option>
                <option value="student" {{ $user->role === 'student' ? 'selected' : '' }}>Student</option>
            </select>

            <label for="image">Profile Image:</label>
            <input type="file" id="image" name="image" accept="image/*">

            <button type="submit">Update</button>
        </form>
    </div>
@endsection
