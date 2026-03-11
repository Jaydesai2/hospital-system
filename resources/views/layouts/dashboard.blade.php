<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HealthSync') }} Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-[hsl(var(--hospital-text))] bg-slate-50 overflow-hidden">
    @php
        $role = auth()->user()->role ?? '';
        $navItems = [];
        if ($role === 'admin') {
            $navItems = [
                ['name' => 'Overview', 'route' => 'admin.dashboard', 'icon' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z'],
                ['name' => 'Manage Doctors', 'route' => 'admin.doctors.index', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
            ];
        } elseif ($role === 'doctor') {
            $navItems = [
                ['name' => 'Overview', 'route' => 'doctor.dashboard', 'icon' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z'],
                ['name' => 'Appointments', 'route' => 'doctor.appointments', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['name' => 'My Schedule', 'route' => 'doctor.schedules.index', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ];
        } elseif ($role === 'patient') {
            $navItems = [
                ['name' => 'Overview', 'route' => 'patient.dashboard', 'icon' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z'],
                ['name' => 'Book A Specialist', 'route' => 'patient.doctors', 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                ['name' => 'My Appointments', 'route' => 'patient.appointments', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ];
        }
    @endphp

    <div class="flex flex-col sm:flex-row h-screen w-full relative" x-data="{ mobileMenuOpen: false }">

        <!-- Mobile Header Navbar -->
        <div
            class="sm:hidden bg-slate-900 text-white border-b border-slate-800 flex items-center justify-between px-6 py-4 relative z-50">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <div
                    class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center text-white shadow-lg shadow-blue-500/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
                <span class="text-xl font-black tracking-tight text-white">HealthSync</span>
            </a>
            <!-- Hamburger Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="p-2 text-slate-300 hover:text-white focus:outline-none" aria-label="Toggle navigation">
                <svg x-show="!mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
                <svg x-cloak x-show="mobileMenuOpen" style="display: none;" class="w-7 h-7" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Sidebar Navigation -->
        <aside
            class="w-full sm:w-72 bg-slate-900 border-r border-slate-800 flex flex-col shrink-0 text-white overflow-y-auto transition-all duration-300 ease-in-out z-50 sm:z-20 absolute sm:relative top-[73px] sm:top-0 h-[calc(100vh_-_73px)] sm:h-auto left-0 -translate-y-full opacity-0 pointer-events-none sm:translate-y-0 sm:opacity-100 sm:pointer-events-auto"
            :class="mobileMenuOpen ? '!translate-y-0 !opacity-100 !pointer-events-auto shadow-2xl border-b border-slate-800' : ''">
            <!-- Brand -->
            <div class="hidden sm:flex h-24 px-8 border-b border-white/5 items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                    <div
                        class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-500/20 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <span class="text-2xl font-black tracking-tight text-white">HealthSync</span>
                </a>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-4 py-8 space-y-2">
                @foreach ($navItems as $item)
                    @php
                        // Determine if current route matches this item
                        $isActive = request()->routeIs($item['route']) || request()->url() === route($item['route']);
                    @endphp
                    <a href="{{ route($item['route']) }}"
                        class="flex items-center gap-4 px-4 py-3.5 rounded-2xl font-bold text-sm tracking-wide transition-all {{ $isActive ? 'bg-blue-600/10 text-blue-400' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        <svg class="w-5 h-5 {{ $isActive ? 'text-blue-500' : 'text-slate-500' }}" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}">
                            </path>
                        </svg>
                        {{ $item['name'] }}
                    </a>
                @endforeach

                <!-- Divider -->
                <div class="my-6 border-t border-white/5 mx-4"></div>

                <div class="px-4 mb-2 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">System</div>

                <a href="{{ route('profile.edit') }}"
                    class="flex items-center gap-4 px-4 py-3.5 rounded-2xl font-bold text-sm tracking-wide transition-all {{ request()->routeIs('profile.edit') ? 'bg-blue-600/10 text-blue-400' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('profile.edit') ? 'text-blue-500' : 'text-slate-500' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                    </svg>
                    Settings
                </a>
            </nav>

            <!-- User Info & Logout (Bottom) -->
            <div class="p-4 border-t border-white/5 mt-auto bg-slate-900/50">
                <div class="flex items-center gap-4 mb-4 px-2">
                    <div
                        class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center font-bold text-slate-300">
                        {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-sm font-bold text-white truncate">{{ auth()->user()->name ?? 'User' }}</p>
                        <p class="text-[11px] font-bold text-slate-500 uppercase tracking-widest truncate">{{ $role }}
                        </p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-3 px-4 py-3 rounded-xl font-bold text-sm tracking-wide text-rose-400 bg-rose-500/10 hover:bg-rose-500/20 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Log Out
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <main class="flex-1 h-full flex flex-col relative bg-slate-50 overflow-y-auto">
            <!-- Header (Optional Page Title) -->
            @isset($header)
                <header
                    class="bg-white border-b border-slate-200 shrink-0 sticky top-0 z-40 px-8 py-6 flex items-center justify-between">
                    {{ $header }}

                    <div class="flex items-center gap-4">
                        <div class="text-right">
                            <p class="text-[10px] font-bold text-green-500 uppercase tracking-widest leading-none mb-1">
                                Status</p>
                            <p class="text-xs font-bold text-slate-400">System Active</p>
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Content Area -->
            <div class="p-8 pb-20 w-full max-w-7xl mx-auto flex-1">
                {{ $slot }}
            </div>

            <!-- Global Footer -->
            <div class="mt-auto">
                <x-footer />
            </div>
        </main>
    </div>

    <!-- Global Toast Notifications -->
    <x-toast />
</body>

</html>