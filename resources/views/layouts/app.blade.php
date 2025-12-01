<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Lapangan</title>

    <!-- Bootstrap CDN -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="{{ route('home') }}">
                Daftar Lapangan
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">

                <ul class="navbar-nav me-auto">

                    <li class="nav-item">
                        <a 
                            class="nav-link {{ Request::is('/') ? 'active' : '' }}" 
                            href="{{ route('home') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a 
                            class="nav-link {{ Request::is('bookings.my-booking') ? 'active' : '' }}" 
                            href="{{ route('bookings.my-booking') }}">
                            Booking Saya
                        </a>
                    </li>

                    {{-- Menu admin --}}
                    <li class="nav-item">
                        <a 
                            class="nav-link {{ Request::is('admin') ? 'active' : '' }}" 
                            href="{{ route('admin.dashboard') }}">
                            Kelola Admin
                        </a>
                    </li>

                    <li class="nav-item">
                        <a 
                            class="nav-link {{ Request::is('fields') ? 'active' : '' }}" 
                            href="{{ route('admin.fields.index') }}">
                            Kelola Lapangan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a 
                            class="nav-link {{ Request::is('/bookings') ? 'active' : '' }}" 
                            href="{{ route('bookings.index') }}">
                            Semua Booking
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>
</body>
</html>
