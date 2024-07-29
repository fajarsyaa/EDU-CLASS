@extends('layouts.app')
@section('title', 'Edu Class | Lets Make Ur Class and Go learning')
@section('content')
    <h1>Create Comment</h1>

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <div>
            <label for="module_id">Module ID</label>
            <input type="text" name="module_id" id="module_id" required>
        </div>
        <div>
            <label for="user_id">User ID</label>
            <input type="text" name="user_id" id="user_id" required>
        </div>
        <div>
            <label for="message">Message</label>
            <textarea name="message" id="message" required></textarea>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
