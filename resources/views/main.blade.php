<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Sklep Komputerowy' }}</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #2A9D8F;
            --secondary-color: #264653;
            --accent-color: #E9C46A;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: 700;
        }
        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        .btn-success {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            background-color: var(--secondary-color);
        }
        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
        }
        .text-shadow-black {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
        .card-img-container {
            position: relative;
        }
        .new-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background-color: var(--accent-color, #E9C46A);
            color: var(--secondary-color, #264653);
            padding: 0.3rem 0.6rem;
            font-size: 0.8rem;
            font-weight: 700;
            border-radius: 0.25rem;
            z-index: 10;
        }
        .opis-wrapper {
            position: relative;
        }
        .opis-zwiniety {
            max-height: 300px;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .opis-zwiniety::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50px;
            background: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1));
        }
        .product-card-img-wrapper {
            width: 100%;
            padding-top: 75%;
            position: relative;
            overflow: hidden;
            background-color: #eee;
        }
        .product-card-img-wrapper .card-img-top {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Sklep PC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produkty.index') }}">Produkty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kategorie.index') }}">Kategorie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kontakt.index') }}">Kontakt</a>
                    </li>
                </ul>
                
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('koszyk.index') }}" title="Koszyk">
                                <span class="material-icons-outlined">shopping_cart</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Logowanie</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-sm ms-2">Rejestracja</a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ulubione.index') }}" title="Ulubione">
                                <span class="material-icons-outlined">favorite_border</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('koszyk.index') }}" title="Koszyk">
                                <span class="material-icons-outlined">shopping_cart</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->Nazwa }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Panel Klienta</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Ustawienia Profilu</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Wyloguj się</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4">
        @if (session('status')) <div class="alert alert-success">{{ session('status') }}</div> @endif
        @if (session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
        @yield('content')
    </main>

    <footer class="bg-white border-top mt-5">
        <div class="container py-4">
            <p class="text-center text-muted">&copy; {{ date('Y') }} Sklep Komputerowy. Wszelkie prawa zastrzeżone.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>