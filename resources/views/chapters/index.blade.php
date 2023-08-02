@extends('layouts.app')

@section('title', 'List All Chapters')

@section('content')
    <div class="header">
        <div class="profile">
            <h3>List All Chapters</h3>
        </div>
        <div class="menu">
            <form action="{{ route('dashboard') }}" method="head">
                @csrf
                <button type="submit">Back to Dashboard</button>
            </form>
        </div>
    </div>

    @if($chapters->count() > 0)
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
                    @foreach ($chapters as $chapter)
                        <tr>
                            <td>{{ $chapter->id }}</td>
                            <td>{{ $chapter->chapter }}</td>
                            <td>
                                <form action="{{ route('chapters.update', $chapter->id) }}" method="post">
                                    @csrf
                                    @method('post')
                                    <input type="text" name="chapter" value="{{ $chapter->chapter }}" required>
                                    <button type="submit">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('chapters.destroy', $chapter->id) }}" method="post">
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
        <h1>Add Chapter</h1>
        <form method="POST" action="{{ route('chapters.store') }}">
            @csrf
            <label>Chapter:</label><br>
            <input type="text" name="chapter" required><br><br>
            <button type="submit">Add</button>
        </form>
    </div>
@endsection
