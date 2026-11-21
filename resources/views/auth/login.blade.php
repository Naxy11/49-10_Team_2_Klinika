@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="card" style="max-width: 420px; margin: 40px auto;">
        <h2>Login Petugas</h2>

        <form action="{{ route('login.attempt') }}" method="POST">
            @csrf

            <label for="email">Email:</label>
            <input type="text" name="email" id="email"
                   value="{{ old('email') }}"
                   placeholder="admin@klinik.test"
                   class="@error('email') is-invalid @enderror">
            @error('email')
                <p class="error-text">{{ $message }}</p>
            @enderror

            <label for="password">Password:</label>
            <input type="password" name="password" id="password"
                   placeholder="Masukkan password"
                   class="@error('password') is-invalid @enderror">
            @error('password')
                <p class="error-text">{{ $message }}</p>
            @enderror

            <label style="font-weight: normal; margin-top: 15px;">
                <input type="checkbox" name="remember" value="1"> Ingat saya
            </label>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Masuk</button>
        </form>
    </div>

@endsection