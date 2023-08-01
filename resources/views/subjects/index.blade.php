@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List All Subjects</h1>
    
        <table>
            <thead>
                <tr>        
                    <th>ID</th>
                    <th>Subject</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->subject }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <h1>Add Subject</h1>
        <form method="POST" action="{{ route('subjects.store') }}">
            @csrf
            <label>Subject:</label><br>
            <input type="text" name="subject" required><br><br>
            <input type="submit" value="Add">
        </form>
    </div>
@endsection
