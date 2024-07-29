@extends('layouts.app')
@section('title', 'Edu Class | Lets Make Ur Class and Go learning')
@section('content')
    <div class="container">
        <h1>User Classes</h1>
        <a href="{{ route('user-classes.create') }}" class="btn btn-primary">Add New User Class</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Class ID</th>
                    <th>User ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userClasses as $userClass)
                    <tr>
                        <td>{{ $userClass->id }}</td>
                        <td>{{ $userClass->class_id }}</td>
                        <td>{{ $userClass->user_id }}</td>
                        <td>
                            <a href="{{ route('user-classes.show', $userClass) }}" class="btn btn-info">View</a>
                            <a href="{{ route('user-classes.edit', $userClass) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('user-classes.destroy', $userClass) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
