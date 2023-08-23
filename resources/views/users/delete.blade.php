@extends('layouts.app')

@section('content')
    <h1>Delete User</h1>

    <p>Are you sure you want to delete {{ $user->username }}?</p>

    <form method="POST" action="{{ route('users.delete', $user) }}">
        @csrf
        @method('DELETE')

        <button type="submit">Delete</button>
    </form>
@endsection
