@extends('layouts.app')

@section('content')

    <h1>List Users</h1>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td><a href="{{ route('users.edit', $user) }}">Edit</a></td>
                    <td>
                        <form action="{{ route('users.delete', $user) }}" method="post">
                            @csrf
                            @method('delete')
                            {{-- <td><a href="{{ route('users.delete', $user) }}">Delete</a></td> --}}
                            <button type="submit">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
