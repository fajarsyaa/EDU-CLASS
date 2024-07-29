@extends('layouts.app')
@section('title', 'Edu Class | Lets Make Ur Class and Go learning')
@section('content')
    <h1>Comments</h1>
    <a href="{{ route('comments.create') }}">Create New Comment</a>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <ul>
        @foreach ($comments as $comment)
            <li>
                {{ $comment->message }}
                <a href="{{ route('comments.show', $comment->id) }}">View</a>
                <a href="{{ route('comments.edit', $comment->id) }}">Edit</a>
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
