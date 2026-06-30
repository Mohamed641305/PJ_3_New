@extends('layouts.app')

@section('content')
    <style>
        body {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            min-height: 100vh;
            overflow: hidden;
        }

        .auth-card {
            border: none;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .15);
        }

        .auth-left {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            padding: 50px 40px;
        }

        .auth-right {
            padding: 40px;
            background: #fff;
        }

        .brand-icon {
            width: 85px;
            height: 85px;
            background: rgba(255, 255, 255, .15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            margin-bottom: 20px;
        }

        .form-control {
            height: 50px;
            border-radius: 12px;
        }

        .btn-primary {
            height: 50px;
            border-radius: 12px;
            font-weight: 600;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border: none;
        }

        .auth-title {
            font-weight: 700;
        }

        @media(max-width:768px) {
            .auth-left {
                display: none;
            }
        }
    </style>

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-lg-9">

                <div class="auth-card card">

                    <div class="row g-0">

                        <!-- Left Side -->
                        <div class="col-lg-5 auth-left">

                            <div class="brand-icon">
                                <i class="fas fa-key"></i>
                            </div>

                            <h3 class="fw-bold">Reset Password 🔐</h3>

                            <p class="opacity-75" style="font-size:14px;">
                                Don’t worry, we’ll send you a reset link to your email.
                            </p>

                        </div>

                        <!-- Right Side -->
                        <div class="col-lg-7 auth-right">

                            <h4 class="mb-4 text-center auth-title">
                                Forgot Password
                            </h4>

                            <p class="mb-4 text-center text-muted" style="font-size:13px;">
                                Enter your email and we’ll send you a reset link.
                            </p>

                            <!-- Status -->
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        required autofocus>
                                </div>

                                <!-- Button -->
                                <button type="submit" class="btn btn-primary w-100">
                                    Email Password Reset Link
                                </button>

                            </form>

                            <div class="mt-3 text-center">
                                <a href="{{ route('login') }}" class="text-decoration-none" style="font-size:13px;">
                                    Back to Login
                                </a>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
