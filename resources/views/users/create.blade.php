@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .registration-form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="file"] {
            width: 100%;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="registration-form">
        <h1>Add user</h1>
        <form action="{{ route('add.user') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="new_username">New Username:</label>
            <input type="text" id="new_username" name="username" required><br>
            <label for="new_email">New Email:</label>
            <input type="text" id="new_email" name="email" required><br>
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="password" required><br>
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
            </select><br>
            <label for="image">Profile Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required><br>
            <input type="submit" value="ADD User">
        </form>
    </div>
</body>
</html>
@endsection
