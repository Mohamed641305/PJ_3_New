@extends('layouts.edu-admin')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <!-- Welcome -->
    <div class="mb-5 welcome-box">
        <div>
            <h2 class="mb-1 fw-bold">Welcome Back 👋</h2>
            <p class="mb-0">
                Manage your system efficiently from your dashboard.
            </p>
        </div>

        <div class="welcome-icon">
            <i class="fas fa-chart-pie"></i>
        </div>
    </div>

    <div class="row g-4">

        <!-- Total Users -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card">
                <div class="card-body">

                    <div class="icon users">
                        <i class="fas fa-users"></i>
                    </div>

                    <h6>Total Users</h6>
                    <h2>{{ $usercount }}</h2>

                    <span class="status">
                        <i class="fas fa-users"></i>
                        All Registered Users
                    </span>

                </div>
            </div>
        </div>

        <!-- Active Users -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card">
                <div class="card-body">

                    <div class="icon active">
                        <i class="fas fa-user-check"></i>
                    </div>

                    <h6>Active Users</h6>
                    <h2>{{ $activeUsers }}</h2>

                    <span class="status">
                        <i class="fas fa-circle text-success"></i>
                        Active Accounts
                    </span>

                </div>
            </div>
        </div>

        <!-- Blocked Users -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card">
                <div class="card-body">

                    <div class="icon tasks">
                        <i class="fas fa-ban"></i>
                    </div>

                    <h6>Blocked Users</h6>
                    <h2>{{ $blockedUsers }}</h2>

                    <span class="status">
                        <i class="fas fa-ban"></i>
                        Blocked Accounts
                    </span>

                </div>
            </div>
        </div>

        <!-- Admins -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card">
                <div class="card-body">

                    <div class="icon reports">
                        <i class="fas fa-user-shield"></i>
                    </div>

                    <h6>Administrators</h6>
                    <h2>{{ $adminsCount }}</h2>

                    <span class="status">
                        <i class="fas fa-user-shield"></i>
                        Admin Accounts
                    </span>

                </div>
            </div>
        </div>

    </div>

</div>

<style>

.welcome-box{
    background: linear-gradient(135deg,#4f46e5,#7c3aed);
    color:#fff;
    padding:30px;
    border-radius:25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 15px 35px rgba(79,70,229,.2);
}

.welcome-icon{
    width:80px;
    height:80px;
    border-radius:50%;
    background:rgba(255,255,255,.15);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:35px;
}

.dashboard-card{
    border:none;
    border-radius:25px;
    overflow:hidden;
    transition:.3s;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
}

.dashboard-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,.12);
}

.dashboard-card .card-body{
    padding:30px;
}

.dashboard-card h6{
    color:#6c757d;
    margin-top:20px;
}

.dashboard-card h2{
    font-size:38px;
    font-weight:700;
    margin:10px 0;
}

.icon{
    width:65px;
    height:65px;
    border-radius:20px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:28px;
}

.users{
    background:linear-gradient(135deg,#3b82f6,#2563eb);
}

.active{
    background:linear-gradient(135deg,#10b981,#34d399);
}

.tasks{
    background:linear-gradient(135deg,#f59e0b,#fbbf24);
}

.reports{
    background:linear-gradient(135deg,#ef4444,#f87171);
}

.status{
    color:#6c757d;
    font-size:14px;
}

</style>

@endsection