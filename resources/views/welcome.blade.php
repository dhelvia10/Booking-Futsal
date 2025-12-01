<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- PERBAIKAN TAMPILAN (TANPA UBAH STRUKTUR) --}}
    <style>
        /* Background SVG agar tidak membesar */
        #background {
            max-width: 500px !important;
            opacity: 0.25;
        }

        /* Pada layar kecil */
        @media (max-width: 640px) {
            #background {
                max-width: 260px !important;
                left: -40px !important;
            }
        }

        /* Container agar tidak terlalu melebar */
        .container-fixed {
            max-width: 1200px;
            margin: auto;
        }

        /* Agar teks tidak terlalu mepet */
        .content-box {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    </style>

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">

    <div class="relative flex flex-col items-center justify-center min-h-screen py-6">
        
        {{-- Background SVG --}}
        <svg id="background" class="absolute -left-20 top-0 max-w-[877px] dark:text-white/10 text-gray-900/10"
            viewBox="0 0 878 636" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M500 100C600 150 700 250 750 350C800 450 780 550 700 600C650 630 550 640 450 620C350 600 250 550 200 480C150 410 150 320 200 250C250 180 350 120 450 90C480 80 520 80 550 100Z"
                fill="currentColor" />
        </svg>

        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl container-fixed">

            {{-- NAV / LOGIN --}}
            <header class="flex justify-end py-4">
                @if (Route::has('login'))
                    <nav class="flex gap-6">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:outline-blue-500">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            {{-- CONTENT --}}
            <main class="mt-20 content-box">
                <h1 class="text-4xl font-bold text-gray-800 dark:text-white mb-4">
                    Welcome to Laravel
                </h1>

                <p class="text-gray-600 dark:text-gray-300 max-w-xl leading-relaxed">
                    Your Laravel project is running successfully.
                </p>
            </main>

        </div>
    </div>

</body>

</html>
