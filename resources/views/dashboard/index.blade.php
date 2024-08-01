@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="welcome-container" style="margin-top: 100px; text-align: center;">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="welcome-message" style="display: inline-block; padding: 20px 40px; border-radius: 10px; background-color: #f8f9fa; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        @if (Auth::user()->fullname)
            <h2 style="color: #333;">Welcome, {{ Auth::user()->fullname }}!</h2>
            <p style="color: #666; font-size: 16px;">We are glad to have you here. Start exploring and make the most out of your learning experience.</p>
        @else
            <h2 style="color: #333;">Welcome to Edu Class!</h2>
            <p style="color: #666; font-size: 16px;">We are glad to have you here. Start exploring and make the most out of your learning experience.</p>
        @endif
    </div>
</div>
@endsection