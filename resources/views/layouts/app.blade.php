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
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-[hsl(var(--hospital-text))] bg-[hsl(var(--hospital-bg))]">
    <div class="relative min-h-screen flex flex-col">
        <!-- Modern Background Elements (Optional for dashboards, but keeps consistency) -->
        <div class="fixed inset-0 -z-20 overflow-hidden pointer-events-none">
            <div
                class="absolute -top-[10%] -left-[10%] w-[50%] h-[50%] bg-blue-100/30 rounded-full blur-[120px] animate-pulse">
            </div>
            <div class="absolute top-[20%] -right-[10%] w-[40%] h-[40%] bg-indigo-50/40 rounded-full blur-[100px]">
            </div>
        </div>

        <!-- Global Premium Header -->
        @if(!request()->routeIs('doctor.today.schedule') && !request()->routeIs('patient.appointments.book'))
            <x-header />
        @endif

        <!-- Main Content Area -->
        <main
            class="flex-1 flex flex-col relative w-full {{ request()->routeIs('doctor.today.schedule') || request()->routeIs('patient.appointments.book') ? 'pt-0' : 'pt-20' }}">
            <!-- Optional Page Header/Title Section -->
            @isset($header)
                <div class="bg-white/50 backdrop-blur-sm border-b border-slate-100 py-6 mt-4">
                    <div class="max-w-7xl mx-auto px-6 lg:px-16 flex items-center justify-between">
                        {{ $header }}

                        <!-- Quick Actions/Status (formerly in top nav) -->
                        <div class="flex items-center gap-4 hidden sm:flex">
                            <div class="text-right">
                                <p class="text-[10px] font-bold text-green-500 uppercase tracking-widest leading-none mb-1">
                                    Status</p>
                                <p class="text-xs font-bold text-slate-400">System Active</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endisset

            <!-- Constrained Page Content -->
            <div class="max-w-7xl mx-auto w-full px-6 lg:px-16 py-12 flex-1">
                {{ $slot }}
            </div>
        </main>

        <!-- Global Premium Footer -->
        <x-footer />
    </div>

    <x-toast />
</body>

</html>