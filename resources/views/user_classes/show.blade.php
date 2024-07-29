@extends('layouts.app')
@section('title', 'Edu Class | Lets Make Ur Class and Go learning')
@section('content')
    <div class="container">
        <h1>View User Class</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $userClass->id }}</td>
            </tr>
            <tr>
                <th>Class ID</th>
                <td>{{ $userClass->class_id }}</td>
            </tr>
            <tr>
                <th>User ID</th>
                <td>{{ $userClass->user_id }}</td>
            </tr>
        </table>
        <a href="{{ route('user-classes.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection

