@extends('layouts.app', ['title' => 'Login'])
@section('content')
<div class="login">
    <div class="container">
        <div class="login-content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input class="email" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input class="password" id="password" type="password" name="password" required autocomplete="current-password">
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <button type="submit">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

