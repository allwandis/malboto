<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ SiteConfig::get('name') }}</title>
<style>
  .navbar-collapse { display: block !important; }
</style>
    @if(config('googletagmanager.id'))
        @include('googletagmanager::head')
    @endif

    <!-- Styles -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @yield('styles') 
</head>
<body class="font-sans antialiased">
    @include('components.navigation') 
    @if(config('googletagmanager.id'))
        @include('googletagmanager::body')
    @endif

    <div class="min-h-screen bg-gray-100 flex flex-col">
        @include('components.home-navbar')

        <main class="flex-grow">
            <div class="min-h-screen bg-gray-100 flex flex-col">
                @yield('content')
            </div>
        </main>

        @include('components.footer')
    </div>

    <!-- Scripts -->
    @vite('resources/js/app.js')
    @livewireScripts
    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('.dropdown');
            dropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('.dropdown-toggle');
                const menu = dropdown.querySelector('.dropdown-menu');

                toggle.addEventListener('click', (e) => {
                    e.preventDefault();
                    menu.classList.toggle('hidden');
                });

                document.addEventListener('click', (e) => {
                    if (!dropdown.contains(e.target)) {
                        menu.classList.add('hidden');
                    }
                });
            });
        });
    </script>
</body>
</html>
