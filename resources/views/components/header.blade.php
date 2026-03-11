<div x-data="{ mobileMenuOpen: false }" class="relative z-[100]">
    <nav
        class="glass-nav sticky top-0 px-6 lg:px-16 h-20 flex items-center justify-between z-50 transition-all duration-300">
        <a href="{{ url('/') }}" class="flex items-center gap-3 group">
            <div
                class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/20 group-hover:rotate-12 transition-all duration-500">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
            </div>
            <span class="text-xl font-bold text-slate-900 tracking-tight">Health<span
                    class="text-blue-600">Sync</span></span>
        </a>

        <!-- Desktop/Tablet Navigation -->
        @if (!request()->is('admin*') && !request()->is('doctor*') && !request()->is('patient*') && !request()->is('profile*') && !request()->is('dashboard*'))
            <div class="hidden md:flex items-center gap-10">
                <a href="{{ url('/') }}"
                    class="text-sm font-semibold {{ request()->is('/') ? 'text-blue-600' : 'text-slate-600' }} hover:text-blue-600 transition-all">Home</a>
                <a href="{{ route('about') }}"
                    class="text-sm font-semibold {{ request()->routeIs('about') ? 'text-blue-600' : 'text-slate-600' }} hover:text-blue-600 transition-all">About
                    Us</a>
                <a href="{{ route('contactus.index') }}"
                    class="text-sm font-semibold {{ request()->routeIs('contactus.index') ? 'text-blue-600' : 'text-slate-600' }} hover:text-blue-600 transition-all">Contact
                    Us</a>
            </div>
        @endif

        <div class="flex items-center gap-4">
            <div class="hidden md:flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <div class="relative z-50" x-data="{ userMenuOpen: false }" @click.away="userMenuOpen = false">
                            <button @click="userMenuOpen = !userMenuOpen"
                                class="flex items-center gap-2 pl-2 pr-4 py-1.5 bg-white border border-slate-200 rounded-full hover:shadow-md hover:border-blue-200 transition-all">
                                <div
                                    class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-xs ring-2 ring-white">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span
                                    class="text-xs font-bold text-slate-700 max-w-[100px] truncate hidden lg:block">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    :class="{'rotate-180': userMenuOpen}">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="userMenuOpen" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-2"
                                class="absolute right-0 mt-3 w-64 bg-white border border-slate-100 rounded-2xl shadow-[0_20px_50px_-15px_rgba(0,0,0,0.1)] py-2"
                                x-cloak>

                                <div class="px-5 py-3 border-b border-slate-50 mb-2">
                                    <p class="text-sm font-bold text-slate-900">{{ Auth::user()->name }}</p>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">
                                        {{ Auth::user()->role }} Account
                                    </p>
                                </div>

                                <a href="{{ route('dashboard') }}"
                                    class="flex items-center gap-3 px-5 py-2.5 text-sm font-semibold text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                        </path>
                                    </svg>
                                    Dashboard
                                </a>

                                @if(Auth::user()->role === 'patient')
                                    <a href="{{ route('patient.appointments') }}"
                                        class="flex items-center gap-3 px-5 py-2.5 text-sm font-semibold text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        My Appointments
                                    </a>
                                @endif

                                @if(Auth::user()->role === 'doctor')
                                    <a href="{{ route('doctor.appointments') }}"
                                        class="flex items-center gap-3 px-5 py-2.5 text-sm font-semibold text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                            </path>
                                        </svg>
                                        Consultations
                                    </a>
                                @endif

                                <div class="h-px bg-slate-100 my-2"></div>

                                <a href="{{ route('profile.edit') }}"
                                    class="flex items-center gap-3 px-5 py-2.5 text-sm font-semibold text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Account Settings
                                </a>

                                <form method="POST" action="{{ route('logout') }}" class="w-full">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex items-center gap-3 px-5 py-2.5 text-sm font-semibold text-rose-500 hover:bg-rose-50 transition-colors text-left">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                            </path>
                                        </svg>
                                        Sign Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-bold text-slate-600 hover:text-blue-600 transition-all px-4">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-primary-hospital text-sm px-6 py-2.5">Get Started</a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Hamburger Button (Mobile only) -->
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="mobile-only-flex w-12 h-12 items-center justify-center bg-blue-50/50 rounded-2xl text-[hsl(var(--hospital-primary))] hover:bg-blue-50 transition-all duration-300">
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
                <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu Overlay (Mobile only) -->
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="mobile-only-block absolute top-24 left-6 right-6 p-8 bg-white/95 backdrop-blur-2xl rounded-[2.5rem] border border-slate-100 shadow-[0_30px_60px_-15px_rgba(0,0,0,0.1)] z-40 overflow-hidden"
        x-cloak>
        <div class="space-y-6">
            @if (!request()->is('admin*') && !request()->is('doctor*') && !request()->is('patient*') && !request()->is('profile*') && !request()->is('dashboard*'))
                <a href="{{ url('/') }}" @click="mobileMenuOpen = false"
                    class="block text-lg font-bold text-slate-900 border-b border-slate-50 pb-4">Home</a>
                <a href="{{ route('about') }}" @click="mobileMenuOpen = false"
                    class="block text-lg font-bold text-slate-900 border-b border-slate-50 pb-4">About Us</a>
                <a href="{{ route('contactus.index') }}" @click="mobileMenuOpen = false"
                    class="block text-lg font-bold text-slate-900 border-b border-slate-50 pb-4">Contact Us</a>
            @endif

            <div class="pt-4 flex flex-col gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-primary-hospital text-center py-4">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-center font-bold text-slate-600 py-3 border border-slate-100 rounded-2xl">Login</a>
                    <a href="{{ route('register') }}" class="btn-primary-hospital text-center py-4">Create Account</a>
                @endauth
            </div>
        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }

    .mobile-only-flex {
        display: flex;
    }

    .mobile-only-block {
        display: block;
    }

    @media (min-width: 768px) {

        .mobile-only-flex,
        .mobile-only-block {
            display: none !important;
        }
    }

    .glass-nav {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }

    .btn-primary-hospital {
        background: linear-gradient(135deg, #2563eb 0%, #4f46e5 100%);
        color: white;
        font-weight: 800;
        border-radius: 1rem;
        box-shadow: 0 10px 20px -5px rgba(37, 99, 235, 0.3);
        transition: all 0.3s;
    }

    .btn-primary-hospital:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px -5px rgba(37, 99, 235, 0.4);
    }
</style>