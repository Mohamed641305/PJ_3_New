<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f4f7fe;
            transition: .3s;
        }

        body.dark-mode {
            background: #111827;
            color: #fff;
        }

        /* Sidebar */

        .sidebar {
            position: fixed;
            top: 15px;
            left: 15px;
            width: 260px;
            height: calc(100vh - 30px);
            background: linear-gradient(180deg, #0f172a, #1e293b);
            border-radius: 25px;
            padding: 20px 12px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .15);
            transition: .3s;
            z-index: 1000;
        }

        .sidebar.collapsed {
            width: 90px;
        }

        .logo {
            text-align: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #cbd5e1;
            text-decoration: none;
            padding: 15px;
            border-radius: 15px;
            margin-bottom: 10px;
            transition: .3s;
            font-size: 15px;
        }

        .sidebar a i {
            width: 25px;
            text-align: center;
            font-size: 20px;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, .1);
            color: white;
            transform: translateX(5px);
        }

        .sidebar a.active {
            background: linear-gradient(90deg, #2563eb, #3b82f6);
            color: white;
            box-shadow: 0 10px 20px rgba(59, 130, 246, .3);
        }

        .sidebar.collapsed .link-text,
        .sidebar.collapsed .logo-text {
            display: none;
        }

        /* Content */

        .content {
            margin-left: 300px;
            padding: 30px;
            transition: .3s;
        }

        .content.expanded {
            margin-left: 120px;
        }

        /* Topbar */

        .topbar {
            background: rgba(255, 255, 255, .9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 15px 25px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .05);
        }

        body.dark-mode .topbar {
            background: rgba(30, 41, 59, .9);
        }

        .topbar .btn {
            border-radius: 12px;
        }

        /* Cards */

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
        }

        body.dark-mode .card {
            background: #1e293b;
            color: white;
        }

        /* Responsive */

        @media(max-width:992px) {

            .sidebar {
                left: -300px;
            }

            .sidebar.collapsed {
                left: 15px;
                width: 260px;
            }

            .content,
            .content.expanded {
                margin-left: 0;
            }
        }

        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 99999;
        }

        .custom-toast {

            width: 360px;

            background: #fff;

            border-radius: 18px;

            margin-bottom: 15px;

            pointer-events: auto;


            display: flex;

            align-items: center;

            overflow: hidden;

            position: relative;

            box-shadow: 0 15px 40px rgba(0, 0, 0, .15);

            animation: toastIn .4s ease;
        }

        .toast-icon {

            width: 65px;

            text-align: center;

            font-size: 28px;
        }

        .success .toast-icon {
            color: #22c55e;
        }

        .error .toast-icon {
            color: #ef4444;
        }

        .toast-body {

            flex: 1;

            padding: 18px 0;

            pointer-events: none;
        }

        .toast-title {

            font-weight: bold;

            margin-bottom: 4px;
        }

        .toast-close {
            border: none;

            background: none;

            font-size: 20px;

            color: #999;

            padding: 15px;

            cursor: pointer;

            z-index: 999999;

            position: relative;

            pointer-events: auto;
        }

        .toast-close:hover {

            color: #000;
        }

        .toast-progress {

            position: absolute;

            bottom: 0;

            left: 0;

            height: 4px;

            width: 100%;

            background: #2563eb;

            animation: progress 4s linear forwards;
        }

        .success .toast-progress {

            background: #22c55e;
        }

        .error .toast-progress {

            background: #ef4444;
        }

        .hide-toast {

            animation: toastOut .35s forwards;
        }

        @keyframes progress {

            from {
                width: 100%;
            }

            to {
                width: 0%;
            }

        }

        @keyframes toastIn {

            from {

                opacity: 0;

                transform: translateX(120%);
            }

            to {

                opacity: 1;

                transform: translateX(0);
            }

        }

        @keyframes toastOut {

            to {

                opacity: 0;

                transform: translateX(120%);
            }

        }

        .alert-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
            font-size: 20px;
        }

        .success-alert .alert-icon {
            background: #dcfce7;
            color: #16a34a;
        }

        .error-alert .alert-icon {
            background: #fee2e2;
            color: #dc2626;
        }

        .field-error {
            display: block;
            color: #dc3545;
            font-size: .875rem;
            margin-top: .35rem;
            transition: opacity .35s ease;
        }

        .alert-content {
            flex: 1;
            font-size: 15px;
            font-weight: 600;
        }

        .alert-close {
            background: none;
            border: none;
            font-size: 18px;
            color: #888;
            cursor: pointer;
        }

        .alert-close:hover {
            color: #000;
        }

        .hide-alert {
            animation: slideOut .35s forwards;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(120%);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideOut {
            to {
                opacity: 0;
                transform: translateX(120%);
            }
        }
    </style>
</head>

<body>

    @auth
        @if (Auth::user()->role == 'admin')
            <div class="sidebar" id="sidebar">

                <div class="logo">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span class="logo-text">AdminPanel</span>
                </div>

                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="link-text">Dashboard</span>
                </a>

                <a href="{{ route('user') }}" class="{{ request()->routeIs('user*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i>
                    <span class="link-text">Users</span>
                </a>

            </div>
        @endif
    @endauth


    <div class="content" id="content">

        @auth
            @if (Auth::user()->role == 'admin')
                <div class="topbar">

                    <button class="btn btn-outline-primary" onclick="toggleSidebar()">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="gap-2 d-flex">

                        <button class="btn btn-dark" onclick="toggleDarkMode()">
                            <i class="fa fa-moon"></i>
                        </button>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger">
                                <i class="fa fa-sign-out-alt"></i>
                                Logout
                            </button>
                        </form>

                    </div>

                </div>
            @endif
        @endauth

        <div class="mb-3 container-fluid">

            <div class="toast-container">

                @if (session('success'))
                    <div class="custom-toast success">

                        <div class="toast-icon">
                            <i class="fas fa-circle-check"></i>
                        </div>

                        <div class="toast-body">
                            <div class="toast-title">Success</div>
                            <div>{{ session('success') }}</div>
                        </div>

                        <button class="toast-close" onclick="closeToast(this)">
                            <i class="fas fa-xmark"></i>
                        </button>

                        <div class="toast-progress"></div>

                    </div>
                @endif


                @if (session('error'))
                    <div class="custom-toast error">

                        <div class="toast-icon">
                            <i class="fas fa-circle-xmark"></i>
                        </div>

                        <div class="toast-body">
                            <div class="toast-title">Error</div>
                            <div>{{ session('error') }}</div>
                        </div>

                        <button class="toast-close" onclick="closeToast(this)">
                            <i class="fas fa-xmark"></i>
                        </button>

                        <div class="toast-progress"></div>

                    </div>
                @endif


                @if ($errors->any())

                    <div class="custom-toast error">

                        <div class="toast-icon">
                            <i class="fas fa-triangle-exclamation"></i>
                        </div>

                        <div class="toast-body">

                            <div class="toast-title">
                                Validation Error
                            </div>

                            @if ($errors->count() == 1)
                                <div>{{ $errors->first() }}</div>
                            @else
                                <div>
                                    We found some issues with your submission. Please correct them and try again. </div>
                            @endif

                        </div>

                        <button class="toast-close" onclick="closeToast(this)">
                            <i class="fas fa-xmark"></i>
                        </button>

                        <div class="toast-progress"></div>

                    </div>

                @endif

            </div>

        </div>

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('content').classList.toggle('expanded');
        }

        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }
    </script>

    <script>
        function hideFieldErrors() {
            document.querySelectorAll(".field-error").forEach(function(error) {

                error.style.transition = "opacity .35s";

                error.style.opacity = "0";

                setTimeout(() => {
                    error.remove();
                }, 350);

            });
        }

        function closeToast(button) {

            const toast = button.closest(".custom-toast");

            toast.classList.add("hide-toast");

            setTimeout(() => {

                toast.remove();

                hideFieldErrors();

            }, 350);

        }

        window.onload = function() {

            document.querySelectorAll(".custom-toast").forEach(function(toast) {

                setTimeout(function() {

                    toast.classList.add("hide-toast");

                    setTimeout(() => {

                        toast.remove();

                        hideFieldErrors();

                    }, 350);

                }, 4000);

            });

        }
    </script> --}}

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('content').classList.toggle('expanded');
        }

        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }

        // إخفاء رسائل الأخطاء أسفل الحقول
        function hideFieldErrors() {

            const errors = document.querySelectorAll(".field-error");

            if (!errors.length) return;

            errors.forEach(function(error) {

                error.style.transition = "opacity .35s";

                error.style.opacity = "0";

                setTimeout(function() {
                    error.remove();
                }, 350);

            });

        }

        // إغلاق الرسالة عند الضغط على X
        function closeToast(button) {

            const toast = button.closest(".custom-toast");

            if (!toast) return;

            toast.classList.add("hide-toast");

            setTimeout(function() {

                toast.remove();

                hideFieldErrors();

            }, 350);

        }

        // إخفاء الرسالة تلقائياً بعد 4 ثوانٍ
        window.addEventListener("load", function() {

            document.querySelectorAll(".custom-toast").forEach(function(toast) {

                setTimeout(function() {

                    toast.classList.add("hide-toast");

                    setTimeout(function() {

                        toast.remove();

                        hideFieldErrors();

                    }, 350);

                }, 4000);

            });

        });


    </script>


</body>

</html>
