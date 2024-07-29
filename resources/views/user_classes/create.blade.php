@extends('layouts.app')
@section('title', 'Edu Class | Lets Make Ur Class and Go learning')
@section('content')
    <div class="container">
        <h1>Create User Class</h1>
        <form action="{{ route('user-classes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="class_id">Class ID</label>
                <input type="text" class="form-control" id="class_id" name="class_id" required>
            </div>
            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="text" class="form-control" id="user_id" name="user_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

