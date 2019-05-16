@extends('layouts.app')

@section('content')

<div class="flex-container">
    <div class="login">

        <div class="form-container">

            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Gymspiration Logo">
                <h1>GYMSPIRATION</h1>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                @error('username')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                @error('password')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="username">
                    <label for="username">Username:
                        <input type="text" name="username" required autofocus>
                    </label>
                </div>

                <div class="password">
                    <label for="password"> Password:
                        <input type="text" name="password" required autocomplete="current-password">
                    </label>
                </div>

                <div class="checkbox">
                    <input name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="remember">Remember me?</label>
                </div>

                <div class="button">
                    <button type="submit">Login</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
