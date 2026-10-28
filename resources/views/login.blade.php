@extends('layouts.app')

@section('content')

<style>
body {
    font-family: Arial;
    background-color: #3498db;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.login-box {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
    width: 300px;
}

.login-box h2 {
    text-align: center;
    margin-bottom: 20px;
}

.login-box input {
    width: 100%;
    padding: 10px;
    margin: 10px 0px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.login-box button {
    width: 100%;
    padding: 10px;
    background-color: #2980b9;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.login-box button:hover {
    background-color: #1f6391;
}

.error {
    color: red;
    text-align: center;
    margin-bottom: 10px;
}
</style>

<div class="login-box">
    <h2>VPY Login</h2>

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login.process') }}">
        @csrf

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>
</div>

@endsection     