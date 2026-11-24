
@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #eef2f7 0%, #dce6f1 100%);
    }

    .verify-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px 15px;
    }

    .verify-card {
        background: #ffffff;
        width: 100%;
        max-width: 470px;
        padding: 40px 38px;
        border-radius: 18px;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
        text-align: center;
    }

    .verify-logo {
        margin-bottom: 25px;
    }

    .verify-logo img {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }

    .verify-icon {
        width: 85px;
        height: 85px;
        background: #eaf1fc;
        color: #2457a7;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 38px;
        margin: 0 auto 22px;
    }

    .verify-card h3 {
        color: #2457a7;
        font-weight: 700;
        font-size: 24px;
        margin-bottom: 15px;
    }

    .verify-description {
        color: #6c757d;
        font-size: 15px;
        line-height: 1.7;
        margin-bottom: 25px;
    }

    .verify-btn {
        background: #2457a7;
        color: #ffffff;
        border: none;
        border-radius: 9px;
        padding: 13px 22px;
        font-size: 15px;
        font-weight: 600;
        width: 100%;
        transition: 0.3s ease;
        cursor: pointer;
    }

    .verify-btn:hover {
        background: #193f7d;
        color: #ffffff;
        transform: translateY(-2px);
    }

    .verify-footer {
        margin-top: 25px;
        font-size: 13px;
        color: #999;
    }

    .verify-footer a {
        color: #2457a7;
        text-decoration: none;
        font-weight: 600;
    }

    .verify-footer a:hover {
        text-decoration: underline;
    }

    .verify-alert {
        border-radius: 9px;
        font-size: 14px;
        margin-bottom: 22px;
        text-align: left;
    }

    @media (max-width: 576px) {
        .verify-card {
            padding: 30px 22px;
        }
    }
</style>

<div class="verify-wrapper">
    <div class="verify-card">

        <!-- Club Logo -->
        <div class="verify-logo">
            <img src="{{ asset('tsc.png') }}" alt="Three Star Club Logo">
        </div>


        <h3>{{ __('Verify Your Email Address') }}</h3>

        <p class="verify-description">
            Thank you for registering with Three Star Club!
            Before proceeding, please check your email inbox
            and click the verification link we have sent you.
        </p>

        <!-- Success Message -->
        @if (session('resent'))
            <div class="alert alert-success verify-alert" role="alert">
                <i class="fas fa-check-circle mr-2"></i>
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        <!-- Resend Verification Email -->
        <p class="verify-description mb-3">
            Didn't receive the verification email? You can request a new one below.
        </p>

        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf

            <button type="submit" class="verify-btn">
                <i class="fas fa-paper-plane mr-2"></i>
                Resend Verification Email
            </button>
        </form>

        <div class="verify-footer">
            &copy; {{ date('Y') }} Three Star Club. All Rights Reserved.
        </div>

    </div>
</div>

@endsection
