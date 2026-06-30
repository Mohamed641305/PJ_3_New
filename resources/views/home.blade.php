@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- Welcome Card -->
    <div class="mb-5 welcome-card">

        <div>
            <h1 class="fw-bold">
                Welcome, {{ Auth::user()->name }} 👋
            </h1>

            <p class="mb-0">
                Glad to see you again. Manage your account from here.
            </p>
        </div>

        <div class="welcome-icon">
            <i class="fas fa-user"></i>
        </div>

    </div>

    <!-- Statistics -->
    <div class="row g-4">

        <div class="col-md-4">

            <div class="dashboard-card">

                <div class="icon-box bg-primary">
                    <i class="fas fa-user"></i>
                </div>

                <h5 class="mt-4">Profile</h5>

                <p class="text-muted">
                    Manage your personal information.
                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="dashboard-card">

                <div class="icon-box bg-success">
                    <i class="fas fa-envelope"></i>
                </div>

                <h5 class="mt-4">Email</h5>

                <p class="text-muted">
                    {{ Auth::user()->email }}
                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="dashboard-card">

                <div class="icon-box bg-warning">
                    <i class="fas fa-calendar"></i>
                </div>

                <h5 class="mt-4">Member Since</h5>

                <p class="text-muted">
                    {{ Auth::user()->created_at->format('d M Y') }}
                </p>

            </div>

        </div>

    </div>

    <!-- Alert -->
    @if (session('status'))
        <div class="mt-4 alert alert-success rounded-4">
            {{ session('status') }}
        </div>
    @endif

</div>

<style>

    body{
        background:#f4f7fc;
    }

    .welcome-card{
        background: linear-gradient(135deg,#4f46e5,#7c3aed);
        color:#fff;
        border-radius:25px;
        padding:40px;
        display:flex;
        justify-content:space-between;
        align-items:center;
        box-shadow:0 15px 40px rgba(79,70,229,.25);
    }

    .welcome-icon{
        width:90px;
        height:90px;
        border-radius:50%;
        background:rgba(255,255,255,.15);
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:35px;
    }

    .dashboard-card{
        background:#fff;
        padding:30px;
        border-radius:25px;
        text-align:center;
        box-shadow:0 10px 30px rgba(0,0,0,.05);
        transition:.3s;
        height:100%;
    }

    .dashboard-card:hover{
        transform:translateY(-8px);
        box-shadow:0 20px 40px rgba(0,0,0,.1);
    }

    .icon-box{
        width:70px;
        height:70px;
        border-radius:20px;
        margin:auto;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        font-size:28px;
    }

</style>

@endsection