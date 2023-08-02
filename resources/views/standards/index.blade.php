@extends('layouts.app')

@section('title', 'List All Standard')

@section('content')
<div class="header">
    <div class="profile">
        <h3>List All Standard</h3>
    </div>
    <div class="menu">
        <form action="{{ route('dashboard') }}" method="head">
            @csrf
            <button type="submit">Back to Dashboard</button>
        </form>
    </div>
</div>

@if($standards->count() > 0)
<div class="section">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Standard</th>
                <th>Update Data</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($standards as $standard)
            <tr>
                <td>{{ $standard->id }}</td>
                <td>{{ $standard->standard }}</td>
                <td>
                    <form action="{{ route('standards.update', $standard->id) }}" method="post">
                        @csrf
                        @method('post')
                        <input type="text" name="standard" value="{{ $standard->standard }}" required>
                        <button type="submit">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('standards.destroy', $standard->id) }}" method="post">
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
    <h1>Add standard</h1>
    <form method="POST" action="{{ route('standards.store') }}">
        @csrf
        <label>standard:</label><br>
        <input type="text" name="standard" required><br><br>
        <button type="submit">Add</button>
    </form>
</div>
@endsection
