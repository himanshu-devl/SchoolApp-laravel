@extends('layouts.app')

@section('title', 'Assign Subjects to Standards')

@section('content')
    <h1>Assign Subjects to Standards</h1>
    <form method="POST" action="{{ route('assign_subjects.submit') }}">
        @csrf
        <label>Standard:</label><br>
        <select name="standard" required>
            <option value="">Select a standard</option>
            @foreach ($standards as $standard)
                <option value="{{ $standard->id }}">{{ $standard->standard }}</option>
            @endforeach
        </select><br><br>

        <label>Subjects:</label><br>
        <select name="subjects[]" multiple required>
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Assign</button>
    </form>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
@endsection
