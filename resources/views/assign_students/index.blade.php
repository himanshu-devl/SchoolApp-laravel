@extends('layouts.app')

@section('title', 'Assign Students to Standards')

@section('content')
    <h1>Assign Students to Standards</h1>
    <form method="POST" action="{{ route('assign_students.submit') }}">
        @csrf
        <label>Standard:</label><br>
        <select name="standard" required>
            <option value="">Select a standard</option>
            @foreach ($standards as $standard)
                <option value="{{ $standard->id }}">{{ $standard->standard }}</option>
            @endforeach
        </select><br><br>

        <label>Students:</label><br>
        <select name="students[]" multiple required>
            @foreach ($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Assign</button>
    </form>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
@endsection
