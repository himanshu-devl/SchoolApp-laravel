@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List All Chapters</h1>
        <table>
            <thead>
                <tr>        
                    <th>ID</th>
                    <th>Chapter</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($chapters as $chapter)
                    <tr>
                        <td>{{ $chapter->id }}</td>
                        <td>{{ $chapter->chapter }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <h1>Add Chapter</h1>
        <form method="POST" action="{{ route('chapters.store') }}">
            @csrf
            <label>Chapter:</label><br>
            <input type="text" name="chapter" required><br><br>
            <input type="submit" value="Add">
        </form>
    </div>
@endsection
