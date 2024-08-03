@extends('layouts.app')
@section('title', 'Edu Class | Lets Make Ur Class and Go learning')
@section('content')
    <h1>Edit Comment</h1>

    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="module_id">Module ID</label>
            <input type="text" name="module_id" id="module_id" value="{{ $comment->module_id }}" required>
        </div>
        <div>
            <label for="user_id">User ID</label>
            <input type="text" name="user_id" id="user_id" value="{{ $comment->user_id }}" required>
        </div>
        <div>
            <label for="message">Message</label>
            <textarea name="message" id="message" required>{{ $comment->message }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
