<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <header>
        <h1>Welcome to the Dashboard</h1>
        <p>Welcome {{ session('username') }} you are {{ session('role') }} | <a href="{{ route('logout') }}">Logout</a></p>
    </header>
    <nav>
        <ul>
            @if (session('role') === 'admin')
                <li><a href="{{ route('subjects.index') }}">Subject</a></li>
                <li><a href="{{ route('chapters.index') }}">Chapter</a></li>
                <li><a href="{{ route('standards.index') }}">Standard</a></li>
                <li><a href="{{ route('assign_chapters') }}">Assign Chapters to Subjects</a></li>
                <li><a href="{{ route('assign_subjects') }}">Assign Subjects to Standards</a></li>
                <li><a href="{{ route('assign_students') }}">Assign Students to Standards</a></li>
            @elseif (session('role') === 'teacher')
                <li><a href="{{ route('subjects.index') }}">Subject</a></li>
                <li><a href="{{ route('chapters.index') }}">Chapter</a></li>
                <li><a href="{{ route('assign_subjects') }}">Assign Subjects to Standards</a></li>
                <li><a href="{{ route('assign_students') }}">Assign Students to Standards</a></li>
            @elseif (session('role') === 'student')
                <li><a href="{{ route('view_subjects') }}">View Subjects</a></li>
                <li><a href="{{ route('view_chapters') }}">View Chapters</a></li>
                <li><a href="{{ route('view_standards') }}">View Standards</a></li>
            @endif
        </ul>
        
    </nav>
    <div class="container">
        @yield('content')
    </div>
    @if(session('logout_success'))
        <p>Logout successful! Goodbye!</p>
    @endif
</body>
</html>
