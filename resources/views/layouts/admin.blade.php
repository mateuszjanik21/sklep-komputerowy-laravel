<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel Admina - {{ $title ?? 'Sklep' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/onpicc4da48uyq6gw7i95adhnsa5gt09ziyl9jw4httcwvd4/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    
    <style>
        :root {
            --admin-bg: #202020;
            --admin-surface: #2d2d2d;
            --admin-text: #f0f0f0;
            --admin-accent: #3498db;
            --admin-border: #444;
            --admin-muted-text: #9e9e9e;
        }
        body.admin-layout {
            background-color: var(--admin-bg);
            color: var(--admin-text);
        }
        .admin-layout h1, .admin-layout h2, .admin-layout h3, .admin-layout h4, .admin-layout h5, .admin-layout h6 {
            color: white;
        }
        .admin-layout a {
            color: var(--admin-accent);
            text-decoration: none;
        }
        .admin-layout a:hover {
            text-decoration: underline;
        }
        .admin-layout .navbar-admin {
            background-color: var(--admin-surface);
            border-bottom: 1px solid var(--admin-border);
        }
        .admin-layout .navbar-admin .nav-link .material-icons-outlined {
            margin-right: 8px; font-size: 1.2rem; vertical-align: sub;
        }
        .admin-layout .navbar-brand, .admin-layout .nav-link.btn-link {
            color: white !important;
        }
        .admin-layout .nav-link { 
            color: var(--admin-text); 
        }
        .admin-layout .nav-link:hover, .admin-layout .nav-link.active { 
            color: white; 
        }
        
        .admin-layout .card {
            background-color: var(--admin-surface);
            border-color: var(--admin-border);
            color: var(--admin-text);
        }
        .admin-layout .card-header {
            color: white;
            background-color: rgba(255, 255, 255, 0.05);
            border-bottom-color: var(--admin-border);
        }
        .admin-layout .list-group-item {
            color: var(--admin-text);
            background-color: transparent;
            border-color: var(--admin-border);
        }
        .admin-layout .list-group-item strong {
            color: white;
        }
        .admin-layout .table {
            --bs-table-color: var(--admin-text);
            --bs-table-bg: var(--admin-surface);
            --bs-table-border-color: var(--admin-border);
            --bs-table-striped-bg: #3c3c3c;
            --bs-table-hover-bg: #404040;
        }
        .admin-layout .text-muted {
            color: var(--admin-muted-text) !important;
        }
        .admin-layout .card-body p, .admin-layout .list-group-item {
            color: var(--admin-text);
        }
        
        .admin-layout .btn {
            color: white; 
        }
        .admin-layout .btn-primary {
            background-color: var(--admin-accent);
            border-color: var(--admin-accent);
            color: white;
        }
        .admin-layout .btn-primary:hover {
            opacity: 0.9;
        }
        .admin-layout .btn-danger, .admin-layout .btn-secondary, .admin-layout .btn-info {
            color: white !important;
        }
    </style>
    
    @stack('styles')
</head>
<body class="admin-layout">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-admin mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.panel') }}">
                <span class="material-icons-outlined align-middle">security</span>
                Panel Administratora
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.produkty.index') }}">
                            <span class="material-icons-outlined">inventory_2</span>Produkty
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.kategorie.index') }}">
                            <span class="material-icons-outlined">category</span>Kategorie
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.atrybuty.index') }}">
                            <span class="material-icons-outlined">tune</span>Dane techniczne
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.opinie.index') }}">
                            <span class="material-icons-outlined">reviews</span>Opinie
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.zamowienia.index') }}">
                            <span class="material-icons-outlined">shopping_basket</span>Zamówienia
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}" target="_blank" title="Zobacz stronę publiczną">
                            <span class="material-icons-outlined align-middle">visibility</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link" title="Wyloguj się">
                                <span class="material-icons-outlined align-middle">logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        @yield('content')
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>