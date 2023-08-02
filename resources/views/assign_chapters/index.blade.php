@extends('layouts.app')

@section('title', 'Assign Chapters to Subjects')

@section('content')
    <h1>Assign Chapters to Subjects</h1>
    <form method="POST" action="{{ route('assign_chapters.submit') }}">
        @csrf
        <label>Subject:</label><br>
        <select name="subject" required>
            <option value="">Select a subject</option>
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
            @endforeach
        </select><br><br>

        <label>Chapters:</label><br>
        <select name="chapters[]" multiple required>
            @foreach ($chapters as $chapter)
                <option value="{{ $chapter->id }}">{{ $chapter->chapter }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Assign</button>
    </form>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
@endsection
