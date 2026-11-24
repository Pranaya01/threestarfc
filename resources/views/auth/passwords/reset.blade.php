
@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #eef2f7 0%, #dce6f1 100%);
    }

    .reset-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px 15px;
    }

    .reset-card {
        background: #ffffff;
        width: 100%;
        max-width: 450px;
        padding: 40px 38px;
        border-radius: 18px;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
    }

    .reset-logo {
        text-align: center;
        margin-bottom: 20px;
    }

    .reset-logo img {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }

    .reset-icon {
        width: 75px;
        height: 75px;
        background: #eaf1fc;
        color: #2457a7;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        margin: 0 auto 20px;
    }

    .reset-card h3 {
        color: #2457a7;
        font-weight: 700;
        font-size: 24px;
        text-align: center;
        margin-bottom: 10px;
    }

    .reset-description {
        color: #777;
        font-size: 14px;
        text-align: center;
        margin-bottom: 28px;
        line-height: 1.6;
    }

    .reset-form-group {
        margin-bottom: 20px;
    }

    .reset-form-group label {
        color: #444;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .reset-input-group {
        position: relative;
    }

    .reset-input-group .input-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #8a9bb3;
        z-index: 2;
    }

    .reset-input {
        width: 100%;
        height: 48px;
        border: 1px solid #dce2ea;
        border-radius: 9px;
        padding: 10px 42px 10px 42px;
        font-size: 14px;
        outline: none;
        transition: 0.3s ease;
        background: #fff;
    }

    .reset-input:focus {
        border-color: #2457a7;
        box-shadow: 0 0 0 3px rgba(36, 87, 167, 0.1);
    }

    .reset-input.is-invalid {
        border-color: #dc3545;
    }

    .password-toggle {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #8995a5;
        cursor: pointer;
        z-index: 3;
    }

    .password-toggle:hover {
        color: #2457a7;
    }

    .reset-btn {
        width: 100%;
        background: #2457a7;
        color: #fff;
        border: none;
        border-radius: 9px;
        padding: 13px;
        font-size: 15px;
        font-weight: 600;
        margin-top: 8px;
        transition: 0.3s ease;
        cursor: pointer;
    }

    .reset-btn:hover {
        background: #193f7d;
        color: #fff;
        transform: translateY(-2px);
    }

    .reset-footer {
        text-align: center;
        margin-top: 25px;
        font-size: 13px;
        color: #999;
    }

    .invalid-feedback {
        display: block;
        font-size: 12px;
        margin-top: 5px;
    }

    @media (max-width: 576px) {
        .reset-card {
            padding: 30px 22px;
        }
    }
</style>

<div class="reset-wrapper">
    <div class="reset-card">

        <!-- Club Logo -->
        <div class="reset-logo">
            <img src="{{ asset('tsc.png') }}" alt="Three Star Club Logo">
        </div>

        <!-- Reset Icon -->
        <div class="reset-icon">
            <i class="fas fa-lock"></i>
        </div>

        <h3>{{ __('Reset Password') }}</h3>

        <p class="reset-description">
            Create a new password for your account.
            Please enter your email address and choose a new password below.
        </p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email Address -->
            <div class="reset-form-group">
                <label for="email">E-Mail Address</label>

                <div class="reset-input-group">
                    <i class="fas fa-envelope input-icon"></i>

                    <input
                        id="email"
                        type="email"
                        class="reset-input @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ $email ?? old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                        placeholder="Enter your email address"
                    >
                </div>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- New Password -->
            <div class="reset-form-group">
                <label for="password">New Password</label>

                <div class="reset-input-group">
                    <i class="fas fa-lock input-icon"></i>

                    <input
                        id="password"
                        type="password"
                        class="reset-input @error('password') is-invalid @enderror"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Enter new password"
                    >

                    <i class="fas fa-eye password-toggle"
                       onclick="togglePassword('password', this)"></i>
                </div>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="reset-form-group">
                <label for="password-confirm">Confirm New Password</label>

                <div class="reset-input-group">
                    <i class="fas fa-lock input-icon"></i>

                    <input
                        id="password-confirm"
                        type="password"
                        class="reset-input"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm new password"
                    >

                    <i class="fas fa-eye password-toggle"
                       onclick="togglePassword('password-confirm', this)"></i>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="reset-btn">
                <i class="fas fa-key mr-2"></i>
                Reset Password
            </button>

        </form>

        <div class="reset-footer">
            &copy; {{ date('Y') }} Three Star Club. All Rights Reserved.
        </div>

    </div>
</div>

<script>
    function togglePassword(inputId, icon) {
        const input = document.getElementById(inputId);

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

@endsection
