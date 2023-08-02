@extends('layouts.app')

@section('title', 'List All Subjects')

@section('content')
<div class="header">
    <div class="profile">
        <h3>List All subjects</h3>
    </div>
    <div class="menu">
        <form action="{{ route('dashboard') }}" method="head">
            @csrf
            <button type="submit">Back to Dashboard</button>
        </form>
    </div>
</div>

@if($subjects->count() > 0)
<div class="section">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Chapter</th>
                <th>Update Data</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject->id }}</td>
                <td>{{ $subject->subject }}</td>
                <td>
                    <form action="{{ route('subjects.update', $subject->id) }}" method="post">
                        @csrf
                        @method('post')
                        <input type="text" name="subject" value="{{ $subject->subject }}" required>
                        <button type="submit">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="post">
                        @csrf
                        @method('post')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="section">
    <p>No records found!</p>
</div>
@endif

<div class="container">
    <h1>Add subject</h1>
    <form method="POST" action="{{ route('subjects.store') }}">
        @csrf
        <label>subject:</label><br>
        <input type="text" name="subject" required><br><br>
        <button type="submit">Add</button>
    </form>
</div>
@endsection
