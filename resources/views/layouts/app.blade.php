<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    ```
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EduPanel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            background: #f5f7fb;
            min-height: 100vh;
        }

        .navbar-custom {
            background: rgba(255, 255, 255, .85);
            backdrop-filter: blur(10px);
            border-radius: 18px;
            margin: 15px auto;
            width: 95%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
        }

        .navbar-brand {
            font-size: 28px;
            font-weight: 700;
            color: #4f46e5 !important;
        }

        main {
            padding-top: 20px;
        }

        .custom-alert {
            position: fixed;
            top: 25px;
            right: 25px;
            min-width: 360px;
            max-width: 420px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .15);
            display: flex;
            align-items: center;
            padding: 18px;
            z-index: 9999;
            animation: slideIn .4s ease;
        }

        .success-alert {
            border-left: 5px solid #22c55e;
        }

        .error-alert {
            border-left: 5px solid #ef4444;
        }

        .alert-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 22px;
            flex-shrink: 0;
        }

        .success-alert .alert-icon {
            background: #dcfce7;
            color: #16a34a;
        }

        .error-alert .alert-icon {
            background: #fee2e2;
            color: #dc2626;
        }

        .alert-content {
            flex: 1;
            font-size: 15px;
            font-weight: 500;
            color: #333;
        }

        .alert-close {
            background: none;
            border: none;
            color: #999;
            font-size: 18px;
            cursor: pointer;
            transition: .3s;
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
    ```

    ```
    <div id="app">

        {{-- NAVBAR --}}
        @if (!Request::routeIs('login') && !Request::routeIs('register'))
            <nav class="navbar navbar-expand-lg navbar-custom">

                <div class="container">

                    <a class="navbar-brand" href="{{ url('/') }}">
                        <i class="fas fa-graduation-cap me-2"></i>
                        EduPanel
                    </a>

                    <div class="ms-auto">

                        @auth
                            <div class="dropdown">

                                <a class="btn btn-light dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown">

                                    <i class="fas fa-user-circle me-1"></i>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">

                                    @if (auth()->user()->role === 'admin')
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                                            <i class="fas fa-gauge me-2"></i>
                                            Dashboard
                                        </a>

                                        <hr class="dropdown-divider">
                                    @endif

                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf

                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-right-from-bracket me-2"></i>
                                            Logout
                                        </button>
                                    </form>

                                </div>

                            </div>
                        @endauth

                    </div>

                </div>

            </nav>
        @endif

        <main>

            <div class="container">

                {{-- Success Message --}}
                @if (session('success'))
                    <div class="custom-alert success-alert">
                        <div class="alert-icon">
                            <i class="fas fa-circle-check"></i>
                        </div>

                        <div class="alert-content">
                            {{ session('success') }}
                        </div>

                        <button class="alert-close" onclick="closeAlert(this)">
                            <i class="fas fa-xmark"></i>
                        </button>
                    </div>
                @endif

                {{-- Error Message --}}
                @if (session('error'))
                    <div class="custom-alert error-alert">
                        <div class="alert-icon">
                            <i class="fas fa-circle-xmark"></i>
                        </div>

                        <div class="alert-content">
                            {{ session('error') }}
                        </div>

                        <button class="alert-close" onclick="closeAlert(this)">
                            <i class="fas fa-xmark"></i>
                        </button>
                    </div>
                @endif

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="custom-alert error-alert">

                        <div class="alert-icon">
                            <i class="fas fa-triangle-exclamation"></i>
                        </div>

                        <div class="alert-content">

                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach

                        </div>
                        <button class="alert-close" onclick="closeAlert(this)">
                            <i class="fas fa-xmark"></i>
                        </button>

                    </div>
                @endif

            </div>

            @yield('content')

        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script>
    const alertBox = document.getElementById('flash-message');

    function closeAlert() {
        if (!alertBox) return;

        alertBox.classList.add('hide-alert');

        setTimeout(() => {
            alertBox.remove();
        }, 350);
    }

    if (alertBox) {
        setTimeout(closeAlert, 4000);
    }
</script> --}}
    {{-- <script>
    function closeAlert(button) {
        const alert = button.closest('.custom-alert');

        alert.classList.add('hide-alert');

        setTimeout(() => {
            alert.remove();
        }, 350);
    }

    document.querySelectorAll('.custom-alert').forEach(alert => {
        setTimeout(() => {
            alert.classList.add('hide-alert');

            setTimeout(() => {
                alert.remove();
            }, 350);

        }, 4000);
    });
</script> --}}
    <script>
        function closeAlert(button) {
            const alert = button.closest(".custom-alert");

            if (!alert) return;

            alert.classList.add("hide-alert");

            setTimeout(() => {
                alert.remove();
            }, 350);
        }

        window.addEventListener("load", () => {
            document.querySelectorAll(".custom-alert").forEach(alert => {

                setTimeout(() => {

                    alert.classList.add("hide-alert");

                    setTimeout(() => {
                        alert.remove();
                    }, 350);

                }, 4000);

            });
        });
    </script>
    ```
    </body>

</html>
