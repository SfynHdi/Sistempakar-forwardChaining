<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Landing Page')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    @auth
        @include('sudah.navigation')
    @else
        @include('belum.navigation')
    @endauth
    @include('layouts.style')
    <div class="content">
        @yield('content')
    </div>

    <footer class="footer">
        <div class="container text-center">
            <div class="footer-logo">HNP Expert System</div>
            <div class="footer-text">Your trusted partner in diagnosing HNP</div>
            <div class="mt-3">
                <p class="copyright">&copy; 2024 HNP Expert System. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
