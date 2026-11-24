
@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #eef2f7 0%, #dce6f1 100%);
        min-height: 100vh;
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px 15px;
    }

    .login-card {
        width: 100%;
        max-width: 430px;
        background: #ffffff;
        border-radius: 16px;
        padding: 40px 38px;
        box-shadow: 0 12px 45px rgba(0, 0, 0, 0.09);
        border: 1px solid rgba(255, 255, 255, 0.8);
    }

    .login-logo {
        text-align: center;
        margin-bottom: 25px;
    }

    
.login-image {
    width: 100px;
    height: 100px;
    object-fit: contain;
    margin-bottom: 15px;
}
    .login-logo h3 {
        font-size: 25px;
        font-weight: 700;
        color: #1c2b40;
        margin-bottom: 8px;
    }

    .login-logo p {
        color: #8793a5;
        font-size: 14px;
        margin: 0;
    }

    .login-card .form-label {
        font-size: 14px;
        font-weight: 600;
        color: #344054;
        margin-bottom: 8px;
    }

    .login-card .form-control {
        height: 48px;
        border: 1px solid #dce2ea;
        border-radius: 9px;
        padding: 10px 14px;
        font-size: 14px;
        box-shadow: none;
        transition: 0.2s ease;
    }

    .login-card .form-control:focus {
        border-color: #2457a7;
        box-shadow: 0 0 0 3px rgba(36, 87, 167, 0.1);
    }

    .password-wrapper {
        position: relative;
    }

    .password-wrapper .form-control {
        padding-right: 45px;
    }

    .password-toggle {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: #8994a5;
        cursor: pointer;
    }

    .login-options {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 18px 0 24px;
        font-size: 13px;
    }

    .login-options a {
        color: #2457a7;
        text-decoration: none;
        font-weight: 600;
    }

    .login-options a:hover {
        text-decoration: underline;
    }

    .login-options .form-check-label {
        color: #667085;
    }

    .login-btn {
        width: 100%;
        height: 49px;
        border: none;
        border-radius: 9px;
        background: #2457a7;
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .login-btn:hover {
        background: #193f7d;
        transform: translateY(-1px);
        box-shadow: 0 5px 15px rgba(36, 87, 167, 0.2);
    }

    .login-footer {
        text-align: center;
        margin-top: 28px;
        color: #98a2b3;
        font-size: 12px;
    }

    @media (max-width: 480px) {
        .login-card {
            padding: 32px 23px;
        }
    }
</style>

<div class="login-wrapper">
    <div class="login-card">

        <div class="login-logo">
             <img src="{{ asset('tsc.png') }}"
                alt="Three Star Club Logo"
                class="login-image">

            <h3>Welcome Back!</h3>
            <p>Please sign in to continue to your account.</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email Address</label>

                <input
                    id="email"
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email address"
                    required
                    autocomplete="email"
                    autofocus
                >

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group mb-3">
                <label for="password" class="form-label">Password</label>

                <div class="password-wrapper">
                    <input
                        id="password"
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        placeholder="Enter your password"
                        required
                        autocomplete="current-password"
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        onclick="togglePassword()"
                        aria-label="Show password"
                    >
                        <i class="fas fa-eye" id="passwordIcon"></i>
                    </button>
                </div>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="login-options">

                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="remember"
                        id="remember"
                        {{ old('remember') ? 'checked' : '' }}
                    >

                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                @endif

            </div>

            <!-- Login Button -->
            <button type="submit" class="login-btn">
                Sign In <i class="fas fa-arrow-right ml-1"></i>
            </button>

        </form>

        <div class="login-footer">
            &copy; {{ date('Y') }} All Rights Reserved.
        </div>

    </div>
</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.getElementById('passwordIcon');
        const button = document.querySelector('.password-toggle');

        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
            button.setAttribute('aria-label', 'Hide password');
        } else {
            password.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
            button.setAttribute('aria-label', 'Show password');
        }
    }
</script>

@endsection
