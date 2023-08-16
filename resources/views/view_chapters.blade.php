@extends('layouts.app')

@section('content')
   
    <h1>View chapters</h1>
    <ul>
        @foreach ($chapters as $chapter)
            <li>{{ $chapter->chapter }}</li>
        @endforeach
    </ul>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
@endsection
