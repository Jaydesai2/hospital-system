<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'HealthSync') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased selection:bg-blue-100/50">
    <div class="relative min-h-screen">
        <!-- Modern Background Elements -->
        <div class="fixed inset-0 -z-20 overflow-hidden pointer-events-none">
            <div
                class="absolute -top-[10%] -left-[10%] w-[50%] h-[50%] bg-blue-100/30 rounded-full blur-[120px] animate-pulse">
            </div>
            <div class="absolute top-[20%] -right-[10%] w-[40%] h-[40%] bg-indigo-50/40 rounded-full blur-[100px]">
            </div>
            <div class="absolute -bottom-[10%] left-[20%] w-[30%] h-[30%] bg-rose-50/30 rounded-full blur-[100px]">
            </div>
        </div>

        <x-header />

        <main>
            <!-- Hero Section -->
            <section class="relative pt-20 pb-32 overflow-hidden">
                <div class="max-w-7xl mx-auto px-6 lg:px-16 grid md:grid-cols-2 gap-12 lg:gap-16 items-center">
                    <div class="relative z-10 space-y-8 animate-fade-in">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50/80 backdrop-blur-md text-[hsl(var(--hospital-primary))] rounded-full text-[12px] font-bold uppercase tracking-wider shadow-sm ring-1 ring-blue-100">
                            <span class="flex h-2 w-2 relative">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                            </span>
                            Next-Generation Healthcare
                        </div>

                        <h1
                            class="text-5xl lg:text-6xl font-black text-[hsl(var(--hospital-header))] leading-[1.1] tracking-tight">
                            Your Health,<br>
                            <span class="text-gradient">Our Priority</span><br>
                            Redefined.
                        </h1>

                        <p class="text-lg text-slate-500 leading-relaxed max-w-xl">
                            Combining advanced medical technology with compassionate care to provide
                            you and your family with the best health outcomes possible.
                        </p>

                        <div class="flex flex-wrap gap-4 pt-2">
                            <a href="{{ route('register') }}"
                                class="btn-primary-hospital px-8 py-4 text-[15px] flex items-center gap-2">
                                Book Appointment
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                            <a href="{{ route('contactus.index') }}"
                                class="px-8 py-4 text-[15px] font-bold text-slate-700 bg-white shadow-lg shadow-black/5 rounded-2xl border border-slate-100 hover:bg-slate-50 transition-all">
                                Contact & Financial Aid
                            </a>
                        </div>

                        <div class="pt-8 flex flex-col sm:flex-row sm:items-center gap-6">
                            <div class="flex -space-x-4">
                                @for($i = 1; $i <= 4; $i++)
                                    <div class="w-12 h-12 rounded-full border-4 border-white overflow-hidden shadow-md">
                                        <img src="https://i.pravatar.cc/150?u={{$i + 10}}"
                                            alt="User">
                                    </div>
                                @endfor
                            </div>
                            <div class="flex flex-col">
                                <span class="text-lg font-bold text-slate-900 leading-tight">15.4k+ Satisfied
                                    Patients</span>
                                <span class="text-sm text-slate-400 font-medium">Join our growing healthy
                                    community</span>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <!-- Content Card Overlapping Image -->
                        <div
                            class="relative z-10 rounded-[3rem] overflow-hidden shadow-2xl shadow-blue-900/10 border border-white transform lg:rotate-2 group hover:rotate-0 transition-all duration-700">
                            <img src="{{ asset('images/hero.png') }}" alt="Modern Hospital"
                                class="w-full h-[600px] object-cover animate-float">
                        </div>

                        <!-- Floating Badge 1 -->
                        <div class="absolute -top-10 -right-10 z-20 bg-white p-5 rounded-3xl shadow-xl shadow-black/5 border border-slate-50 flex items-center gap-4 animate-float"
                            style="animation-delay: -2s;">
                            <div class="w-12 h-12 bg-green-50 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-slate-900 mb-0.5">99%</p>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-widest leading-none">
                                    Efficiency</p>
                            </div>
                        </div>

                        <!-- Floating Badge 2 -->
                        <div class="absolute -bottom-10 -left-10 z-20 bg-white/90 backdrop-blur-xl p-5 rounded-3xl shadow-xl shadow-black/5 border border-white/50 flex items-center gap-4 animate-float"
                            style="animation-delay: -4s;">
                            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-slate-900 mb-0.5">24/7</p>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-widest leading-none">
                                    Support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <!-- Stats Section -->
            <section id="stats" class="py-24 relative overflow-hidden group/stats">
                <!-- Premium Mesh Background -->
                <div class="absolute inset-0 bg-slate-950">
                    <div class="absolute inset-0 opacity-40">
                        <div class="absolute -top-[20%] -left-[10%] w-[60%] h-[60%] bg-blue-600 rounded-full blur-[120px] animate-pulse"></div>
                        <div class="absolute top-[20%] -right-[10%] w-[50%] h-[50%] bg-indigo-600 rounded-full blur-[100px]" style="animation-delay: -2s;"></div>
                        <div class="absolute -bottom-[20%] left-[20%] w-[40%] h-[40%] bg-blue-400 rounded-full blur-[100px]" style="animation-delay: -4s;"></div>
                    </div>
                    <!-- Animated Grid Pattern -->
                    <div class="absolute inset-0 opacity-[0.03]" 
                        style="background-image: linear-gradient(#fff 1px, transparent 1px), linear-gradient(90deg, #fff 1px, transparent 1px); background-size: 50px 50px;">
                    </div>
                </div>

                <div class="max-w-7xl mx-auto px-6 lg:px-16 relative z-10">
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8">
                        @foreach([
                            ['label' => 'Expert Doctors', 'value' => '250', 'suffix' => '+', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                            ['label' => 'Global Patients', 'value' => '15', 'suffix' => 'k+', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                            ['label' => 'Support Schemes', 'value' => '6', 'suffix' => '+', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                            ['label' => 'Years Experience', 'value' => '20', 'suffix' => '+', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z']
                        ] as $index => $stat)
                            <div class="stat-item group/item relative p-8 bg-white/5 backdrop-blur-xl border border-white/10 rounded-[2.5rem] hover:bg-white/10 hover:-translate-y-2 hover:shadow-[0_30px_60px_-15px_rgba(59,130,246,0.3)] transition-all duration-500 animate-staggered-up overflow-hidden"
                                style="animation-delay: {{ $index * 150 }}ms;">
                                <div class="flex flex-col items-center">
                                    <div class="mb-6 p-4 rounded-2xl bg-white/10 text-blue-400 group-hover/item:scale-110 group-hover/item:bg-blue-500 group-hover/item:text-white transition-all duration-500">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"></path>
                                        </svg>
                                    </div>
                                    <div class="flex items-baseline gap-1">
                                        <span class="count-up text-5xl lg:text-6xl font-black text-white tracking-tighter" data-value="{{ $stat['value'] }}">0</span>
                                        <span class="text-3xl font-black text-blue-400">{{ $stat['suffix'] }}</span>
                                    </div>
                                    <p class="mt-4 text-[11px] font-black text-slate-400 uppercase tracking-[0.3em]">{{ $stat['label'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <x-footer />
    </div>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes staggered-up {
            from { opacity: 0; transform: translateY(40px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .animate-fade-in { animation: fade-in 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .animate-staggered-up { animation: staggered-up 1.2s cubic-bezier(0.16, 1, 0.3, 1) both; }

        .count-up {
            font-variant-numeric: tabular-nums;
        }

        [data-intersecting="false"] .animate-staggered-up {
            animation: none;
            opacity: 0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observerOptions = {
                threshold: 0.2
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counters = entry.target.querySelectorAll('.count-up');
                        counters.forEach(counter => {
                            const target = parseInt(counter.getAttribute('data-value'));
                            const duration = 2000;
                            const startTime = performance.now();
                            
                            const animate = (currentTime) => {
                                const elapsed = currentTime - startTime;
                                const progress = Math.min(elapsed / duration, 1);
                                
                                // Ease out cubic
                                const easedProgress = 1 - Math.pow(1 - progress, 3);
                                const currentCount = Math.floor(easedProgress * target);
                                
                                counter.textContent = currentCount;
                                
                                if (progress < 1) {
                                    requestAnimationFrame(animate);
                                } else {
                                    counter.textContent = target;
                                }
                            };
                            
                            requestAnimationFrame(animate);
                        });
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            const statsSection = document.getElementById('stats');
            if (statsSection) observer.observe(statsSection);
        });
    </script>
</body>

</html>