@extends('layouts.app')

@section('content')
   
    <h1>View Standards</h1>
    <ul>
        @foreach ($standards as $standard)
            <li>{{ $standard->standard }}</li>
        @endforeach
    </ul>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
@endsection
