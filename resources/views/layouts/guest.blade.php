<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HealthSync') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-[var(--hospital-text)] flex flex-col min-h-screen bg-slate-50">
    <x-header />

    <main class="flex-grow flex flex-col items-center justify-center py-12 px-6 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-50 -mr-48 -mt-48"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-teal-50 rounded-full blur-3xl opacity-50 -ml-48 -mb-48"></div>

        <div class="w-full {{ $maxWidth ?? 'sm:max-w-xl' }} z-10">
            <div
                class="bg-white shadow-2xl rounded-[3rem] border border-blue-50 overflow-hidden {{ $padding ?? 'px-8 py-10' }}">
                {{ $slot }}
            </div>
        </div>
    </main>

    <x-footer />
</body>

</html>