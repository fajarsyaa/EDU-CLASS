@extends('layouts.app')
@section('title', 'Edu Class | Lets Make Ur Class and Go learning')
@section('content')
    <h1>Comment Details</h1>

    <p><strong>Module ID:</strong> {{ $comment->module_id }}</p>
    <p><strong>User ID:</strong> {{ $comment->user_id }}</p>
    <p><strong>Message:</strong> {{ $comment->message }}</p>

    <a href="{{ route('comments.index') }}">Back to List</a>
@endsection
