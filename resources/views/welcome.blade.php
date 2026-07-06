@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        min-height: 100vh;
    }

    .hero-box {
        background: #fff;
        border-radius: 30px;
        padding: 60px;
        box-shadow: 0 20px 50px rgba(0,0,0,.15);
    }

    .hero-title {
        font-size: 55px;
        font-weight: 700;
        color: #4f46e5;
    }

    .hero-text {
        color: #6c757d;
        font-size: 18px;
    }

    .btn-custom {
        padding: 12px 35px;
        border-radius: 50px;
        font-size: 18px;
    }

    .icon-box {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg,#4f46e5,#7c3aed);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 55px;
        margin: auto;
    }
</style>

<div class="container">

    <div class="row justify-content-center align-items-center" style="min-height:100vh;">

        <div class="col-lg-10">

            <div class="hero-box">

                <div class="row align-items-center">

                    <div class="text-center col-md-6">

                        <div class="mb-4 icon-box">
                            <i class="fas fa-graduation-cap"></i>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <h1 class="hero-title">
                            EduPanel
                        </h1>

                        <p class="my-4 hero-text">
                            Welcome to EduPanel System.
                            Manage users and your educational platform easily and efficiently.
                        </p>

                        @guest

                            <a href="{{ route('login') }}" class="btn btn-primary btn-custom me-2">
                                <i class="fas fa-right-to-bracket me-2"></i>
                                Login
                            </a>

                            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-custom">
                                <i class="fas fa-user-plus me-2"></i>
                                Register
                            </a>

                        @else

                            <h4 class="mb-4 text-success">
                                Welcome {{ Auth::user()->name }} 👋
                            </h4>

                            <a href="{{ route('home') }}" class="btn btn-primary btn-custom me-2">
                                <i class="fas fa-house me-2"></i>
                                Home
                            </a>

                            @if(Auth::user()->role == 'admin')

                                <a href="{{ route('dashboard') }}" class="btn btn-success btn-custom">
                                    <i class="fas fa-gauge-high me-2"></i>
                                    Dashboard
                                </a>

                            @endif

                        @endguest

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
