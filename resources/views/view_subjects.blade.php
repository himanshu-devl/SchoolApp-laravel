@extends('layouts.app')

@section('content')
    <h1>View Subjects</h1>
    <ul>
        @foreach ($subjects as $subject)
            <li>{{ $subject->subject }}</li>
        @endforeach
    </ul>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
@endsection
