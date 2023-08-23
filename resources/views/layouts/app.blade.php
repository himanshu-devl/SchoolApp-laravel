<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'School Management System')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        .user-profile {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .user-profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
}


    </style>
    <link href="{{ asset('css/user-edit.css') }}" rel="stylesheet">

</head>
<body>
    <header>
        <h1>School Management System</h1>
        <p>Welcome {{ session('username') }}! You are {{ session('role') }} | <a href="{{ route('logout') }}">Logout</a></p>
        <div class="user-profile">
            <img src="{{ asset('storage/user_images/' . session('image')) }}" alt="{{ session('username') }} Profile Image" >
        </div>
    </header>
    <div class="main-container">
        <nav class="sidebar">
            <ul>
                @if (session('role') === 'admin')
                    <li><a href="{{ route('subjects.index') }}">Subjects</a></li>
                    <li><a href="{{ route('chapters.index') }}">Chapters</a></li>
                    <li><a href="{{ route('standards.index') }}">Standards</a></li>
                    <li><a href="{{ route('assign_chapters') }}">Assign Chapters</a></li>
                    <li><a href="{{ route('assign_subjects') }}">Assign Subjects</a></li>
                    <li><a href="{{ route('assign_students') }}">Assign Students</a></li>
                    <li><a href="{{ route('users.create') }}">Add User</a></li>
                    <li><a href="{{ route('users.index') }}">List Users</a></li>

                @elseif (session('role') === 'teacher')
                    <li><a href="{{ route('subjects.index') }}">Subjects</a></li>
                    <li><a href="{{ route('chapters.index') }}">Chapters</a></li>
                    <li><a href="{{ route('assign_subjects') }}">Assign Subjects</a></li>
                    <li><a href="{{ route('assign_students') }}">Assign Students</a></li>
                @elseif (session('role') === 'student')
                    <li><a href="{{ route('view_subjects') }}">View Subjects</a></li>
                    <li><a href="{{ route('view_chapters') }}">View Chapters</a></li>
                    <li><a href="{{ route('view_standards') }}">View Standards</a></li>
                    <!-- Dropdown menu for student -->
                    <li>
                        <a href="#">More Options &#9662;</a>
                        <ul class="dropdown">
                            <li><a href="#">Option 1</a></li>
                            <li><a href="#">Option 2</a></li>
                            <li><a href="#">Option 3</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <div class="content-container">
            <div class="content">
                @yield('content')
            </div>
            <footer>
                <p>&copy; 2023 School Management System</p>
                <p><a href="#">About Us</a> | <a href="#">Contact</a></p>
            </footer>
        </div>
    </div>
</body>
</html>
