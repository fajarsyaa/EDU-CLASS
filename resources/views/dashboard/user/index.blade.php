@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="container">
    <div class="card">
    <h1 style="color: white">Users</h1>
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-2">Add User</a>
    @if (session('success'))
      <div class="alert alert-success">
         {{ session('success') }}
      </div>
   @endif
   @if ($errors->any())
      <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
   @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline;">
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
</div>
@endsection
