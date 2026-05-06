<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro — Minimalist Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            color: #2d3436;
        }
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #edf2f7;
            padding: 1rem 0;
        }
        .navbar-brand {
            font-weight: 600;
            letter-spacing: -0.5px;
            color: #1a202c !important;
        }
        .nav-link {
            color: #718096 !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: color 0.2s;
        }
        .nav-link.active {
            color: #1a202c !important;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }
        .btn-primary {
            background-color: #1a202c;
            border-color: #1a202c;
            border-radius: 8px;
            font-weight: 500;
            padding: 0.6rem 1.2rem;
        }
        .btn-primary:hover {
            background-color: #2d3748;
            border-color: #2d3748;
        }
        .table {
            --bs-table-bg: transparent;
        }
        .table thead th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            color: #a0aec0;
            border-top: none;
            padding: 1.25rem 1rem;
        }
        .table tbody td {
            padding: 1.25rem 1rem;
            vertical-align: middle;
            color: #4a5568;
        }
        .badge-borrowed { background-color: #fef3c7; color: #92400e; }
        .badge-returned { background-color: #d1fae5; color: #065f46; }
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            padding: 0.75rem;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
            border-color: #63b3ed;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top mb-5">
        <div class="container">
            <a class="navbar-brand" href="/">LIBRO</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('books*') ? 'active' : '' }}" href="{{ route('books.index') }}">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('borrowings*') ? 'active' : '' }}" href="{{ route('borrowings.index') }}">Borrowings</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm mb-4" style="border-radius: 10px;">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
