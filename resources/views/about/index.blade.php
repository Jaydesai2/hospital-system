<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - {{ config('app.name', 'HealthSync') }}</title>
    <meta name="description" content="Learn about HealthSync — our mission, leadership, values, and commitment to world-class patient care through technology and compassion.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased selection:bg-blue-100/50 bg-[#F8FAFC]">
    <div class="relative min-h-screen">
        <!-- Ambient Background -->
        <div class="fixed inset-0 -z-20 overflow-hidden pointer-events-none">
            <div class="absolute -top-[10%] -left-[10%] w-[50%] h-[50%] bg-blue-100/30 rounded-full blur-[120px] animate-pulse"></div>
            <div class="absolute top-[20%] -right-[10%] w-[40%] h-[40%] bg-indigo-50/40 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-[10%] left-[20%] w-[30%] h-[30%] bg-teal-50/20 rounded-full blur-[80px]"></div>
        </div>

        <x-header />

        <main class="pt-16 pb-24">
            <div class="max-w-7xl mx-auto px-6 lg:px-16"><br>

                <!-- ═══════════════════════════════════════ HERO ═══════════════════════════════════════ -->
                <div class="grid lg:grid-cols-2 gap-16 items-center mb-20 animate-fade-in">
                    <!-- Hero Image — smaller glass card -->
                    <div class="relative group animate-fade-in max-w-lg mx-auto w-full" style="animation-delay: 200ms;">
                        <div class="absolute -inset-4 bg-gradient-to-tr from-blue-600/20 to-indigo-600/20 rounded-[3rem] blur-2xl group-hover:scale-105 transition-transform duration-700"></div>
                        <div class="relative rounded-[2.5rem] overflow-hidden border border-white/50 shadow-2xl">
                            <img src="{{ asset('images/about/hospital_architecture.png') }}" alt="HealthSync Hospital"
                                class="w-full aspect-square object-cover group-hover:scale-105 transition-transform duration-1000">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-950/20 to-transparent"></div>
                            <!-- Glass card — inline height so it fits text only -->
                            <div class="absolute bottom-6 left-6 right-6" style="background: rgba(255,255,255,0.82); backdrop-filter: blur(16px); border-radius: 1.5rem; border: 1px solid rgba(255,255,255,0.4); padding: 1.25rem 1.5rem;">
                                <div class="flex items-start gap-3 text-left">
                                    <svg class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                    </svg>
                                    <div>
                                        <p class="text-slate-900 font-bold italic leading-snug text-sm">Our goal is to create a healing environment that inspires hope and provides comfort through excellence.</p>
                                        <p class="text-blue-600 font-black text-[10px] uppercase tracking-widest mt-2">— Dr. James Mitchell, CMO</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8 flex flex-col items-center text-center">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50/80 backdrop-blur-md text-blue-600 rounded-full text-[12px] font-bold uppercase tracking-wider shadow-sm ring-1 ring-blue-100">
                            <span class="flex h-2 w-2 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                            </span>
                            Who We Are
                        </div>
                        <h1 class="text-4xl lg:text-6xl font-black text-slate-900 leading-[1.05] tracking-tight">
                            Redefining Healthcare <br><span class="text-gradient">for a Better Future</span>
                        </h1>
                        <p class="text-slate-500 text-lg leading-relaxed max-w-xl mx-auto">
                            At HealthSync, we believe world-class healthcare should be accessible, personalized, and efficient. We combine cutting-edge technology with compassionate expertise to create a seamless health journey for every patient — from first consultation to full recovery.
                        </p>
                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-6 pt-4">
                            @foreach([
                                    ['val' => '25+', 'label' => 'Years of Trust'],
                                    ['val' => '50k+', 'label' => 'Happy Patients'],
                                    ['val' => '120+', 'label' => 'Expert Specialists'],
                                ] as $stat)
                                <div class="bg-white/60 backdrop-blur-md border border-white/60 rounded-2xl p-5 shadow-sm text-center">
                                    <span class="block text-3xl font-black text-slate-900">{{ $stat['val'] }}</span>
                                    <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">{{ $stat['label'] }}</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex flex-wrap justify-center gap-4 pt-2">
                            <a href="{{ route('register') }}" class="px-8 py-4 font-black text-white rounded-2xl shadow-lg transition-all hover:-translate-y-1" style="background: linear-gradient(135deg,#2563eb,#4f46e5); box-shadow: 0 12px 24px -8px rgba(37,99,235,0.4);">
                                Book Appointment
                            </a>
                            <a href="{{ route('contactus.index') }}" class="px-8 py-4 font-black text-slate-700 bg-white border border-slate-100 rounded-2xl shadow-sm hover:bg-slate-50 transition-all">
                                Get Financial Aid
                            </a>
                        </div>
                    </div>
                </div>

                <!-- ═══════════════════════════════════════ WHY CHOOSE US ═══════════════════════════════════════ -->
                <div class="mb-10 mt-10">
                    <div class="text-center mb-12 space-y-4">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50/80 backdrop-blur-md text-blue-600 rounded-full text-[12px] font-bold uppercase tracking-wider shadow-sm ring-1 ring-blue-100">
                            <span class="flex h-2 w-2 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                            </span>
                            Why HealthSync
                        </div>
                        <h2 class="text-4xl lg:text-5xl font-black text-slate-900 tracking-tight">The <span class="text-gradient">HealthSync</span> Difference</h2>
                        <p class="text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed">We go beyond treating symptoms — we build lifelong health partnerships.</p>
                    </div>
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @php
                            $whys = [
                                ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'title' => 'JCI Accredited', 'desc' => 'Internationally accredited hospital meeting the highest global safety and quality benchmarks.', 'color' => '#2563eb'],
                                ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => '24/7 Emergency', 'desc' => 'Round-the-clock emergency services with dedicated trauma teams always on standby.', 'color' => '#dc2626'],
                                ['icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'title' => 'Smart Health Tech', 'desc' => 'AI-assisted diagnostics, digital records and telemedicine for faster, more accurate care.', 'color' => '#7c3aed'],
                                ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'title' => 'Patient-First Care', 'desc' => 'Every decision is made with the patient\'s comfort, dignity and wellbeing at the center.', 'color' => '#059669'],
                            ];
                        @endphp
                        @foreach($whys as $index => $why)
                            <div class="group bg-white/70 backdrop-blur-xl border border-white/60 rounded-[2rem] p-6 flex flex-col items-center text-center overflow-hidden hover:-translate-y-2 hover:shadow-2xl transition-all duration-500 animate-staggered-up"
                                style="animation-delay: {{ $index * 100 }}ms;">
                                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6 shadow-sm" style="background: {{ $why['color'] }}18;">
                                    <svg class="w-7 h-7" style="color: {{ $why['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $why['icon'] }}"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-black text-slate-900 mb-2 group-hover:text-blue-600 transition-colors">{{ $why['title'] }}</h3>
                                <p class="text-slate-500 text-sm leading-relaxed">{{ $why['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- ═══════════════════════════════════════ CORE VALUES ═══════════════════════════════════════ -->
                <div class="mb-10 mt-10">
                    <!-- Heading row -->
                    <div class="grid lg:grid-cols-2 gap-16 items-center mb-8">
                        <div class="space-y-5 text-center">
                            <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50/80 backdrop-blur-md text-blue-600 rounded-full text-[12px] font-bold uppercase tracking-wider shadow-sm ring-1 ring-blue-100">
                            <span class="flex h-2 w-2 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                            </span>
                            Our DNA
                        </div>
                            <h2 class="text-4xl font-black text-slate-900 tracking-tight leading-tight">The Values That <br><span class="text-gradient">Drive Everything We Do</span></h2>
                            <p class="text-slate-500 leading-relaxed text-lg">From day one, our principles have shaped every hire, every policy, and every patient interaction.</p>
                        </div>
                        <!-- Right: Metrics Grid with indigo palette -->
                        <div class="grid grid-cols-2 gap-px bg-white/20 rounded-[2rem] shadow-2xl overflow-hidden">
                            @php
                                $metrics = [
                                    ['val' => '98%', 'label' => 'Patient Satisfaction Rate', 'sub' => 'Based on 2024 surveys', 'gradient' => 'linear-gradient(135deg, #4338CA 0%, #6D28D9 100%)', 'glow' => '#6366F1'],
                                    ['val' => '<24h', 'label' => 'Avg. Appointment Wait', 'sub' => 'Faster than national avg.', 'gradient' => 'linear-gradient(135deg, #6D28D9 0%, #4338CA 100%)', 'glow' => '#6366F1'],
                                    ['val' => '40+', 'label' => 'Medical Specialties', 'sub' => 'Under one roof', 'gradient' => 'linear-gradient(135deg, #4338CA 0%, #6366F1 100%)', 'glow' => '#6366F1'],
                                    ['val' => '₹0', 'label' => 'Emergency Care Upfront', 'sub' => 'Treat first, pay later', 'gradient' => 'linear-gradient(135deg, #6D28D9 0%, #6366F1 100%)', 'glow' => '#2DD4BF'],
                                ];
                            @endphp
                            @foreach($metrics as $index => $metric)
                                <div class="relative overflow-hidden p-8 text-center hover:contrast-125 transition-all duration-400 group animate-staggered-up"
                                    style="background: {{ $metric['gradient'] }}; animation-delay: {{ $index * 100 }}ms;">
                                    <div class="absolute inset-0 bg-white/0 group-hover:bg-white/10 transition-colors duration-400"></div>
                                    <!-- Glow orb -->
                                    <div class="absolute -top-6 -right-6 w-24 h-24 rounded-full blur-2xl opacity-30" style="background: {{ $metric['glow'] }};"></div>
                                    <span class="relative block text-4xl font-black leading-none" style="color: #E5E7EB;">{{ $metric['val'] }}</span>
                                    <span class="relative block text-xs font-bold mt-3" style="color: #E5E7EB;">{{ $metric['label'] }}</span>
                                    <span class="relative block text-[10px] font-black mt-1.5 uppercase tracking-wider" style="color: #2DD4BF;">{{ $metric['sub'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Values cards row — full width 4-col grid -->
                    @php
                        $values = [
                            ['title' => 'Integrity & Transparency', 'desc' => 'We uphold the highest ethical standards. Patients receive honest, clear information about their diagnosis, treatment options and costs.', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'accent' => '#4338CA'],
                            ['title' => 'Innovation & Research', 'desc' => 'We invest heavily in R&D, partnering with leading global medical universities and adopting the latest treatment protocols.', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'accent' => '#6D28D9'],
                            ['title' => 'Compassion & Dignity', 'desc' => 'Every patient is treated with genuine empathy. We create a healing environment where people feel safe, heard and respected.', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', 'accent' => '#2DD4BF'],
                            ['title' => 'Community & Inclusion', 'desc' => 'We serve everyone — regardless of income or background — through financial aid programs and community outreach.', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857', 'accent' => '#6366F1'],
                        ];
                    @endphp
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($values as $index => $val)
                            <div class="group bg-white/70 backdrop-blur-xl border border-white/60 rounded-[2rem] p-6 flex flex-col items-center text-center overflow-hidden hover:-translate-y-2 hover:shadow-2xl transition-all duration-500 animate-staggered-up gap-4" style="animation-delay: {{ $index * 100 }}ms;">
                                <div class="w-14 h-14 rounded-2xl flex items-center justify-center shrink-0" style="background: {{ $val['accent'] }}18;">
                                    <svg class="w-7 h-7" style="color: {{ $val['accent'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $val['icon'] }}"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-black text-slate-900 text-[15px] mb-2">{{ $val['title'] }}</h4>
                                    <p class="text-slate-500 text-sm leading-relaxed">{{ $val['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- ═════════════════════════════ SPECIALTIES SHOWCASE ════════════════════════════ -->
                <div class="mb-10 mt-10">
                    <div class="text-center mb-20 space-y-5">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50/80 backdrop-blur-md text-blue-600 rounded-full text-[12px] font-bold uppercase tracking-wider shadow-sm ring-1 ring-blue-100">
                            <span class="flex h-2 w-2 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                            </span>
                            Medical Expertise
                        </div>
                        <h2 class="text-4xl lg:text-5xl font-black text-slate-900 tracking-tight">Our <span class="text-gradient">Key Specialties</span></h2>
                        <p class="text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed">40+ departments staffed by board-certified specialists with decades of combined experience.</p>
                    </div>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @php
                            $specialties = [
                                ['name' => 'Cardiology & Heart Surgery', 'desc' => 'State-of-the-art cath labs and a dedicated cardiac ICU for complex interventions including valve replacements and bypass surgeries.', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', 'color' => '#dc2626', 'bg' => '#fef2f2'],
                                ['name' => 'Neurology & Brain Surgery', 'desc' => 'MRI-guided procedures and a 24/7 stroke response unit to protect brain health and deliver precise neurological care.', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'color' => '#7c3aed', 'bg' => '#f5f3ff'],
                                ['name' => 'Orthopedics & Joint Care', 'desc' => 'Minimally invasive joint replacements with accelerated rehabilitation protocols and dedicated physiotherapy suites.', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'color' => '#2563eb', 'bg' => '#eff6ff'],
                                ['name' => 'Oncology & Cancer Care', 'desc' => 'Comprehensive cancer treatment combining radiation, chemotherapy, and the latest immunotherapy protocols with a multidisciplinary tumor board.', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => '#059669', 'bg' => '#f0fdf4'],
                                ['name' => 'Pediatrics & Neonatology', 'desc' => 'Child-friendly wards with a Level-III NICU, specialized pediatric ICU, and compassionate nursing teams trained in neonatal care.', 'icon' => 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => '#f59e0b', 'bg' => '#fffbeb'],
                                ['name' => "Women's Health & Maternity", 'desc' => 'Full-spectrum gynecology, high-risk obstetrics, fertility treatments, and luxury birthing suites for a dignified birth experience.', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'color' => '#ec4899', 'bg' => '#fdf2f8'],
                            ];
                        @endphp
                        @foreach($specialties as $index => $sp)
                            <div class="group flex flex-col items-center gap-6 p-9 bg-white/70 border border-white/60 rounded-[2.5rem] backdrop-blur-xl shadow-xl hover:-translate-y-2 hover:shadow-2xl transition-all duration-400 animate-staggered-up text-center overflow-hidden"
                                style="animation-delay: {{ $index * 80 }}ms;">
                                <div class="w-16 h-16 rounded-2xl flex items-center justify-center shadow-md shrink-0" style="background: {{ $sp['bg'] }};">
                                    <svg class="w-8 h-8" style="color: {{ $sp['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $sp['icon'] }}"></path>
                                    </svg>
                                </div>
                                
                                <div>
                                    <h3 class="font-black text-slate-900 text-lg mb-3 group-hover:text-blue-600 transition-colors">{{ $sp['name'] }}</h3>
                                    <p class="text-slate-500 text-sm leading-relaxed">{{ $sp['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- ═══════════════════════════════════════ LEADERSHIP ═══════════════════════════════════════ -->
                <div class="mb-20">
                    <div class="text-center mb-12 space-y-4">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50/80 backdrop-blur-md text-blue-600 rounded-full text-[12px] font-bold uppercase tracking-wider shadow-sm ring-1 ring-blue-100">
                            <span class="flex h-2 w-2 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                            </span>
                            Meet Our Leadership
                        </div>
                        <h2 class="text-4xl lg:text-5xl font-black text-slate-900 tracking-tight">Meet Our <span class="text-gradient">Leadership</span></h2>
                        <p class="text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed">World-renowned medical directors and healthcare innovators guiding HealthSync's vision.</p>
                    </div>
                    <div class="grid md:grid-cols-2 gap-8">
                        @php
                            $directors = [
                                ['name' => 'Dr. James Mitchell', 'role' => 'Chief Medical Officer', 'image' => 'director_1.png', 'exp' => '25+ yrs', 'field' => 'Cardiovascular Surgery', 'bio' => 'Dr. Mitchell has performed over 3,000 open-heart surgeries and leads HealthSync\'s institutional research partnerships with Johns Hopkins and AIIMS Delhi.'],
                                ['name' => 'Dr. Sarah Chen', 'role' => 'Director of Innovation', 'image' => 'director_2.png', 'exp' => '18+ yrs', 'field' => 'Health Technology', 'bio' => 'Dr. Chen pioneered several AI-assisted diagnostic protocols now used in 14 countries and led HealthSync\'s digital transformation to a fully paperless patient journey.'],
                            ];
                        @endphp
                        @foreach($directors as $index => $director)
                            <div class="group flex flex-col items-center text-center gap-4 p-6 bg-white/50 border border-white/60 rounded-[2.5rem] backdrop-blur-xl shadow-xl hover:shadow-2xl transition-all duration-500 animate-staggered-up"
                                style="animation-delay: {{ $index * 200 }}ms;">
                                <div class="relative w-48 h-48 rounded-3xl overflow-hidden border-4 border-white shadow-xl flex-shrink-0 group-hover:scale-105 transition-transform duration-500">
                                    <img src="{{ asset('images/about/' . $director['image']) }}" alt="{{ $director['name'] }}" class="w-full h-full object-cover">
                                </div>
                                <div class="space-y-4 py-2 flex flex-col items-center">
                                    <div>
                                        <h3 class="text-2xl font-black text-slate-900">{{ $director['name'] }}</h3>
                                        <p class="text-[11px] font-black text-blue-600 uppercase tracking-widest mt-1">{{ $director['role'] }}</p>
                                    </div>
                                    <div class="flex flex-wrap justify-center gap-2">
                                        <span class="px-3 py-1 bg-blue-50 text-blue-700 text-[10px] font-black uppercase tracking-wider rounded-full">{{ $director['exp'] }}</span>
                                        <span class="px-3 py-1 bg-indigo-50 text-indigo-700 text-[10px] font-black uppercase tracking-wider rounded-full">{{ $director['field'] }}</span>
                                    </div>
                                    <p class="text-slate-500 text-sm leading-relaxed max-w-sm">{{ $director['bio'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Additional team grid -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-6">
                        @php
                            $team = [
                                ['name' => 'Dr. Ravi Sharma', 'role' => 'Head of Neurology', 'image' => 'dr_ravi_sharma.png'],
                                ['name' => 'Dr. Priya Nair', 'role' => 'Chief of Pediatrics', 'image' => 'dr_priya_nair.png'],
                                ['name' => 'Dr. Ahmed Hassan', 'role' => 'Oncology Director', 'image' => 'dr_ahmed_hassan.png'],
                                ['name' => 'Dr. Lisa Park', 'role' => 'Head of Cardiology', 'image' => 'dr_lisa_park.png'],
                            ];
                        @endphp
                        @foreach($team as $index => $member)
                            <div class="group bg-white/70 backdrop-blur-xl border border-white/60 rounded-[2rem] p-8 flex flex-col items-center text-center overflow-hidden hover:-translate-y-2 hover:shadow-2xl transition-all duration-500 animate-staggered-up"
                                style="animation-delay: {{ ($index + 2) * 100 }}ms;">
                                <div class="relative w-24 h-24 rounded-3xl overflow-hidden border-4 border-white shadow-xl flex-shrink-0 group-hover:scale-105 transition-transform duration-500">
                                    @if(isset($member['image']))
                                        <img src="{{ Str::startsWith($member['image'], 'http') ? $member['image'] : asset('images/about/' . $member['image']) }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-8 h-8 text-slate-200" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                        </svg>
                                    @endif
                                </div>
                                <h3 class="font-black text-slate-900 text-[15px]">{{ $member['name'] }}</h3>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1.5">{{ $member['role'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- ═══════════════════════════════════════ AWARDS ═══════════════════════════════════════ -->
                <div class="mb-32 rounded-[3rem] p-12 lg:p-16 overflow-hidden relative" style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
                    <div class="absolute top-0 right-0 w-96 h-96 rounded-full blur-[120px] opacity-20" style="background: #6366f1;"></div>
                    <div class="relative">
                        <div class="text-center mb-14">
                            <div class="inline-block px-4 py-1.5 bg-white/10 text-white/80 rounded-full text-[11px] font-black uppercase tracking-widest mb-4">Recognition</div>
                            <h2 class="text-4xl font-black text-white">Awards & <span style="color: #2DD4BF;">Accreditations</span></h2>
                        </div>
                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                            @php
                                $awards = [
                                    ['title' => 'JCI Accredited', 'year' => '2019 – Present', 'desc' => 'Joint Commission International — the gold standard in global hospital safety.'],
                                    ['title' => 'NABH Certified', 'year' => '2017 – Present', 'desc' => 'National Accreditation Board for Hospitals & Healthcare Providers.'],
                                    ['title' => 'Best Hospital Award', 'year' => '2023', 'desc' => 'Awarded by HealthCare India for excellence in patient outcomes.'],
                                    ['title' => 'Green Hospital', 'year' => '2022', 'desc' => 'Recognized for sustainable practices and zero-waste medical operations.'],
                                ];
                            @endphp
                            @foreach($awards as $index => $award)
                                <div class="group bg-white/10 backdrop-blur-xl border border-white/10 rounded-[2rem] p-6 text-center hover:-translate-y-2 hover:bg-white/15 hover:shadow-2xl transition-all duration-500 animate-staggered-up"
                                    style="animation-delay: {{ $index * 150 }}ms;">
                                    <div class="w-12 h-12 rounded-full mx-auto mb-4 flex items-center justify-center bg-[#2DD4BF]/10 group-hover:scale-110 transition-transform duration-500">
                                        <svg class="w-6 h-6 text-[#2DD4BF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                        </svg>
                                    </div>
                                    <h4 class="font-black text-white text-base">{{ $award['title'] }}</h4>
                                    <p class="text-[10px] font-bold uppercase tracking-widest mt-1 text-[#2DD4BF]">{{ $award['year'] }}</p>
                                    <p class="text-white/50 text-xs mt-3 leading-relaxed">{{ $award['desc'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- ═══════════════════════════════════════ TESTIMONIALS ═══════════════════════════════════════ -->
                <div class="mb-10 mt-10">
                    <div class="space-y-5 text-center">
                            <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50/80 backdrop-blur-md text-blue-600 rounded-full text-[12px] font-bold uppercase tracking-wider shadow-sm ring-1 ring-blue-100">
                            <span class="flex h-2 w-2 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                            </span>
                            Testimonials
                        </div>
                    <div class="text-center mb-16 space-y-4">
                        <h2 class="text-4xl font-black text-slate-900 tracking-tight">What Our <span class="text-gradient">Patients Say</span></h2>
                    </div><br>
                    <div class="grid md:grid-cols-3 gap-8">
                        @php
                            $testimonials = [
                                ['name' => 'Anjali Mehta', 'location' => 'Mumbai', 'stars' => 5, 'text' => 'After my cardiac surgery, the care I received was extraordinary. Every nurse, every doctor — they treated me like family. I owe HealthSync my life.', 'image' => 'anjali_mehta.png'],
                                ['name' => 'Rajesh Kumar', 'location' => 'Delhi', 'stars' => 5, 'text' => 'The financial aid program helped my family when we needed it most. My father\'s cancer treatment was fully covered. Such compassionate people.', 'image' => 'rajesh_kumar.png'],
                                ['name' => 'Preethi Nair', 'location' => 'Chennai', 'stars' => 5, 'text' => 'From easy online booking to the quality of specialists, HealthSync is truly next-level. My knee replacement only took 6 weeks to recover from!', 'image' => 'preethi_nair.png'],
                            ];
                        @endphp
                        @foreach($testimonials as $index => $t)
                            <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-[2rem] p-8 shadow-xl hover:-translate-y-2 hover:shadow-2xl transition-all duration-500 animate-staggered-up"
                                style="animation-delay: {{ $index * 120 }}ms;">
                                <div class="flex gap-1 mb-5">
                                    @for($i = 0; $i < $t['stars']; $i++)
                                        <svg class="w-4 h-4 text-amber-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    @endfor
                                </div>
                                <p class="text-slate-600 leading-relaxed text-[15px] italic mb-6">"{{ $t['text'] }}"</p>
                                <div class="flex items-center gap-3 pt-5 border-t border-slate-100">
                                    @if(isset($t['image']))
                                        <div class="w-10 h-10 rounded-full border flex items-center justify-center border-slate-200 overflow-hidden shrink-0 shadow-sm bg-slate-50">
                                            <img src="{{ asset('images/about/' . $t['image']) }}" alt="{{ $t['name'] }}" class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-black text-sm shadow-md shadow-blue-500/20 shrink-0">
                                            {{ substr($t['name'], 0, 1) }}
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-black text-slate-900 text-sm">{{ $t['name'] }}</p>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $t['location'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><br><br>

                <!-- ══════════════════════════════════════ CTA ══════════════════════════════════════ -->
                <div class="relative overflow-hidden p-12 lg:p-20 rounded-[3rem] text-center text-white" style="background: linear-gradient(135deg, #2563eb 0%, #4338ca 60%, #4f46e5 100%); box-shadow: 0 40px 80px -20px rgba(37,99,235,0.4);">
                    <div class="absolute top-0 right-0 w-80 h-80 rounded-full blur-[100px] opacity-20" style="background: #818cf8;"></div>
                    <div class="absolute bottom-0 left-0 w-80 h-80 rounded-full blur-[100px] opacity-15" style="background: #2DD4BF;"></div>
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                    <div class="relative max-w-3xl mx-auto space-y-8">
                        <h2 class="text-4xl lg:text-5xl font-black leading-tight">Ready to Experience Better Healthcare?</h2>
                        <p class="text-blue-100 text-lg">Join 50,000+ patients who trust HealthSync for their health journey. Book an appointment or explore our financial aid options today.</p>
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="{{ route('register') }}" class="px-10 py-5 font-black rounded-2xl shadow-xl hover:-translate-y-1 transition-all" style="background: #ffffff; color: #1e40af;">Get Started Now</a>
                            <a href="{{ route('contactus.index') }}" class="px-10 py-5 font-black rounded-2xl transition-all hover:bg-white/20" style="background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); color: #ffffff;">Financial Aid</a>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <x-footer />
    </div>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes staggered-up {
            from { opacity: 0; transform: translateY(36px) scale(0.97); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        .animate-fade-in { animation: fade-in 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .animate-staggered-up { animation: staggered-up 1.1s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .text-gradient {
            background: linear-gradient(135deg, #2563eb 0%, #4f46e5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .glass-quote {
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(16px);
            border-radius: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 1.25rem 1.5rem;
        }
    </style>
</body>

</html>