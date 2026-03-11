<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact & Financial Aid - {{ config('app.name', 'HealthSync') }}</title>
    <meta name="description" content="HealthSync provides financial assistance, subsidized care schemes, and charity programs for patients who need help affording medical treatment and surgeries.">
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
            <div class="absolute bottom-[10%] left-[30%] w-[30%] h-[30%] bg-teal-50/30 rounded-full blur-[80px]"></div>
        </div>

        <x-header />

        <main class="pt-12 pb-24">
            <div class="max-w-7xl mx-auto px-6 lg:px-16">

                <!-- Hero -->
                <div class="text-center space-y-6 mb-20 animate-fade-in">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-teal-50/80 backdrop-blur-md text-teal-600 rounded-full text-[12px] font-bold uppercase tracking-wider shadow-sm ring-1 ring-teal-100">
                        <span class="flex h-2 w-2 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-teal-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-teal-500"></span>
                        </span>
                        Financial Aid & Contact
                    </div>
                    <h1 class="text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                        Healthcare Shouldn't Be <br><span class="text-gradient">Out of Reach</span>
                    </h1>
                    <p class="text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed">
                        We believe every patient deserves world-class care regardless of their financial situation.
                        Explore our support schemes and reach out — we're here to help you find a way.
                    </p>
                </div>

                <!-- Financial Aid Schemes -->
                <div class="mb-24">
                    <div class="text-center mb-14 space-y-3">
                        <h2 class="text-4xl font-black text-slate-900 tracking-tight">Our <span class="text-blue-600">Support Schemes</span></h2>
                        <p class="text-slate-500 max-w-xl mx-auto leading-relaxed">We offer multiple financial programs designed to ensure no patient is turned away due to lack of funds.</p>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @php
                        $schemes = [
                            [
                                'title' => 'Zero-Interest Medical Loans',
                                'badge' => 'No Interest',
                                'badge_color' => 'bg-blue-50 text-blue-600 ring-blue-100',
                                'icon_bg' => 'bg-blue-50',
                                'icon_color' => 'text-blue-600',
                                'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                                'description' => 'Spread the cost of your surgery or treatment over 6–36 months with absolutely zero interest. We work with partner banks to offer flexible repayment plans tailored to your income.',
                                'features' => ['6 to 36-month plans', 'No hidden fees', 'Fast approval in 48 hrs'],
                            ],
                            [
                                'title' => 'Charity Care Program',
                                'badge' => 'Free Care',
                                'badge_color' => 'bg-teal-50 text-teal-600 ring-teal-100',
                                'icon_bg' => 'bg-teal-50',
                                'icon_color' => 'text-teal-600',
                                'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                                'description' => 'Qualifying low-income patients receive completely free consultations, diagnostics, and emergency surgeries through our hospital charity fund, supported by donor contributions.',
                                'features' => ['Income-based eligibility', 'Covers surgery & medicine', 'Confidential application'],
                            ],
                            [
                                'title' => 'Government Subsidy Tie-Ups',
                                'badge' => 'Gov. Backed',
                                'badge_color' => 'bg-indigo-50 text-indigo-600 ring-indigo-100',
                                'icon_bg' => 'bg-indigo-50',
                                'icon_color' => 'text-indigo-600',
                                'icon' => 'M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z',
                                'description' => 'We are an approved partner under multiple government health assistance programs. Our team assists you in applying for subsidies you may already be entitled to.',
                                'features' => ['Ayushman Bharat eligible', 'State scheme enrollments', 'Dedicated liasion officer'],
                            ],
                            [
                                'title' => 'Sliding Scale Fee Structure',
                                'badge' => 'Income Based',
                                'badge_color' => 'bg-amber-50 text-amber-600 ring-amber-100',
                                'icon_bg' => 'bg-amber-50',
                                'icon_color' => 'text-amber-600',
                                'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                                'description' => 'Our consultation and procedure fees automatically scale based on your documented household income. Those with lower income pay significantly reduced rates, protecting your dignity.',
                                'features' => ['Verified income assessment', 'Up to 80% reduction', 'No stigma policy'],
                            ],
                            [
                                'title' => 'Emergency Surgery Fund',
                                'badge' => 'Emergency',
                                'badge_color' => 'bg-rose-50 text-rose-600 ring-rose-100',
                                'icon_bg' => 'bg-rose-50',
                                'icon_color' => 'text-rose-600',
                                'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z M12 9v2m0 4h.01',
                                'description' => 'For life-threatening emergencies, our dedicated fund ensures that financial barriers will never delay critical surgery. We treat first and sort paperwork after.',
                                'features' => ['Immediate authorization', 'Life-threatening cases', 'Zero upfront payment'],
                            ],
                            [
                                'title' => 'Senior Citizen Care Scheme',
                                'badge' => '60+ Special',
                                'badge_color' => 'bg-purple-50 text-purple-600 ring-purple-100',
                                'icon_bg' => 'bg-purple-50',
                                'icon_color' => 'text-purple-600',
                                'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
                                'description' => 'Citizens aged 60 and above receive priority appointments, 40% discount on all non-emergency procedures, and free annual health screening packages under our elder care promise.',
                                'features' => ['Priority appointments', '40% fee discount', 'Free annual checkup'],
                            ],
                        ];
                        @endphp

                        @foreach($schemes as $index => $scheme)
                        <div class="group bg-white/70 backdrop-blur-xl rounded-[2.5rem] border border-white/60 shadow-xl shadow-blue-900/5 p-8 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500 animate-staggered-up flex flex-col gap-5"
                            style="animation-delay: {{ $index * 100 }}ms;">
                            <div class="flex items-center justify-between">
                                <div class="w-14 h-14 {{ $scheme['icon_bg'] }} rounded-2xl flex items-center justify-center shadow-sm">
                                    <svg class="w-7 h-7 {{ $scheme['icon_color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $scheme['icon'] }}"></path>
                                    </svg>
                                </div>
                                <span class="text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full ring-1 {{ $scheme['badge_color'] }}">{{ $scheme['badge'] }}</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-slate-900 mb-2 group-hover:text-blue-600 transition-colors">{{ $scheme['title'] }}</h3>
                                <p class="text-slate-500 text-sm leading-relaxed">{{ $scheme['description'] }}</p>
                            </div>
                            <ul class="space-y-2 mt-auto">
                                @foreach($scheme['features'] as $feature)
                                <li class="flex items-center gap-2.5 text-sm font-semibold text-slate-700">
                                    <svg class="w-4 h-4 text-teal-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    {{ $feature }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- How to Apply Banner -->
                <div class="mb-24 rounded-[3rem] p-12 lg:p-16 overflow-hidden relative" style="background: linear-gradient(135deg, #4338CA 0%, #6D28D9 60%, #5B21B6 100%); box-shadow: 0 30px 60px -15px rgba(99,102,241,0.4);">
                    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
                    <!-- Card Glow Effect -->
                    <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full blur-[80px] opacity-30" style="background: #6366F1;"></div>
                    <div class="absolute -bottom-20 -left-20 w-64 h-64 rounded-full blur-[80px] opacity-20" style="background: #2DD4BF;"></div>
                    <div class="relative grid lg:grid-cols-2 gap-12 items-center">
                        <div class="space-y-6">
                            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-[11px] font-bold uppercase tracking-wider ring-1" style="background: rgba(255,255,255,0.1); color: #2DD4BF; ring-color: rgba(255,255,255,0.2);">
                                <svg class="w-3.5 h-3.5" style="color: #2DD4BF;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                                How It Works
                            </div>
                            <h2 class="text-4xl font-black leading-tight" style="color: #ffffff;">Get Financial Support <br><span style="color: #2DD4BF;">in 3 Simple Steps</span></h2>
                            <p class="leading-relaxed" style="color: #D1D5DB;">Our Patient Support Coordinators handle all the paperwork. You just need to show up.</p>
                        </div>
                        <div class="space-y-5">
                            @php $steps = [
                                ['num' => '01', 'title' => 'Submit Your Request', 'desc' => 'Fill out the contact form below or walk into any HealthSync branch with your ID and relevant medical documents.'],
                                ['num' => '02', 'title' => 'Financial Assessment', 'desc' => 'Our coordinator will review your income and treatment needs to match you with the most suitable scheme — within 24 hours.'],
                                ['num' => '03', 'title' => 'Begin Treatment', 'desc' => 'Once approved, your care begins immediately. We coordinate directly with billing so you\'re never blocked.'],
                            ]; @endphp
                            @foreach($steps as $step)
                            <div class="flex items-start gap-5">
                                <span class="text-3xl font-black w-10 shrink-0 leading-none" style="color: #E5E7EB;">{{ $step['num'] }}</span>
                                <div>
                                    <h4 class="font-black text-base" style="color: #ffffff;">{{ $step['title'] }}</h4>
                                    <p class="text-sm leading-relaxed mt-1" style="color: #D1D5DB;">{{ $step['desc'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Contact Form + Info -->
                <div class="grid lg:grid-cols-2 gap-12 mb-24">
                    <!-- Contact Info -->
                    <div class="space-y-8">
                        <div>
                            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Reach Out <span class="text-gradient">Anytime</span></h2>
                            <p class="text-slate-500 mt-3 leading-relaxed">Our Patient Support team is available 7 days a week. Every inquiry is handled with confidentiality and care.</p>
                        </div>
                        <div class="space-y-5">
                            @php $contacts = [
                                ['icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z', 'label' => 'Financial Aid Helpline', 'value' => '+1 (800) HEALTH-1', 'sub' => 'Mon–Sun, 8 AM – 8 PM'],
                                ['icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'label' => 'Patient Support Email', 'value' => 'aid@healthsync.com', 'sub' => 'We reply within 4 hours'],
                                ['icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'Walk-In Support Office', 'value' => 'Ground Floor, Block B', 'sub' => 'HealthSync Central Hospital'],
                            ]; @endphp
                            @foreach($contacts as $contact)
                            <div class="flex items-start gap-5 p-6 bg-white/60 backdrop-blur-md border border-white/60 rounded-2xl shadow-sm">
                                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $contact['icon'] }}"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">{{ $contact['label'] }}</p>
                                    <p class="font-black text-slate-900 text-base mt-0.5">{{ $contact['value'] }}</p>
                                    <p class="text-slate-400 text-sm mt-0.5">{{ $contact['sub'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="bg-white/70 backdrop-blur-xl rounded-[2.5rem] border border-white/60 shadow-xl p-10">
                        <h3 class="text-2xl font-black text-slate-900 mb-2">Request Financial Assistance</h3>
                        <p class="text-slate-500 text-sm mb-8">Tell us about your situation. All information is strictly confidential.</p>
                        <form action="{{ route('contactus.store') }}" method="POST" class="space-y-6">
                            @csrf
                            @if(session('success'))
                                <div class="p-4 mb-4 text-sm text-green-800 rounded-2xl bg-green-50" role="alert">
                                    <span class="font-black">Success!</span> {{ session('success') }}
                                </div>
                            @endif
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div class="space-y-2">
                                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Full Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="John Doe" class="w-full bg-slate-50/60 border @error('name') border-red-500 @else border-slate-100 @enderror focus:border-blue-300 focus:bg-white rounded-2xl px-5 py-4 text-slate-900 font-semibold placeholder:text-slate-300 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none">
                                    @error('name')
                                        <p class="text-red-500 text-[10px] font-black mt-1 ml-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Phone Number</label>
                                    <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+91 98765 43210" class="w-full bg-slate-50/60 border @error('phone') border-red-500 @else border-slate-100 @enderror focus:border-blue-300 focus:bg-white rounded-2xl px-5 py-4 text-slate-900 font-semibold placeholder:text-slate-300 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none">
                                    @error('phone')
                                        <p class="text-red-500 text-[10px] font-black mt-1 ml-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Email Address</label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" class="w-full bg-slate-50/60 border @error('email') border-red-500 @else border-slate-100 @enderror focus:border-blue-300 focus:bg-white rounded-2xl px-5 py-4 text-slate-900 font-semibold placeholder:text-slate-300 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none">
                                @error('email')
                                    <p class="text-red-500 text-[10px] font-black mt-1 ml-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="space-y-2">
                                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Scheme of Interest</label>
                                <select name="scheme" class="w-full bg-slate-50/60 border @error('scheme') border-red-500 @else border-slate-100 @enderror focus:border-blue-300 focus:bg-white rounded-2xl px-5 py-4 text-slate-900 font-semibold focus:ring-4 focus:ring-blue-500/10 transition-all outline-none h-[58px]">
                                    <option value="" disabled {{ old('scheme') == '' ? 'selected' : '' }}>Select a scheme...</option>
                                    <option value="Zero-Interest Medical Loan" {{ old('scheme') == 'Zero-Interest Medical Loan' ? 'selected' : '' }}>Zero-Interest Medical Loan</option>
                                    <option value="Charity Care Program (Free Care)" {{ old('scheme') == 'Charity Care Program (Free Care)' ? 'selected' : '' }}>Charity Care Program (Free Care)</option>
                                    <option value="Government Subsidy Tie-Up" {{ old('scheme') == 'Government Subsidy Tie-Up' ? 'selected' : '' }}>Government Subsidy Tie-Up</option>
                                    <option value="Sliding Scale Fee Structure" {{ old('scheme') == 'Sliding Scale Fee Structure' ? 'selected' : '' }}>Sliding Scale Fee Structure</option>
                                    <option value="Emergency Surgery Fund" {{ old('scheme') == 'Emergency Surgery Fund' ? 'selected' : '' }}>Emergency Surgery Fund</option>
                                    <option value="Senior Citizen Care Scheme" {{ old('scheme') == 'Senior Citizen Care Scheme' ? 'selected' : '' }}>Senior Citizen Care Scheme</option>
                                    <option value="Not sure — need guidance" {{ old('scheme') == 'Not sure — need guidance' ? 'selected' : '' }}>Not sure — need guidance</option>
                                </select>
                                @error('scheme')
                                    <p class="text-red-500 text-[10px] font-black mt-1 ml-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="space-y-2">
                                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Your Situation</label>
                                <textarea name="situation" rows="4" placeholder="Briefly describe your medical situation and why you need financial assistance..." class="w-full bg-slate-50/60 border @error('situation') border-red-500 @else border-slate-100 @enderror focus:border-blue-300 focus:bg-white rounded-2xl px-5 py-4 text-slate-900 font-semibold placeholder:text-slate-300 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none resize-none">{{ old('situation') }}</textarea>
                                @error('situation')
                                    <p class="text-red-500 text-[10px] font-black mt-1 ml-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="w-full flex items-center justify-center gap-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-5 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl shadow-blue-500/25 hover:shadow-blue-500/40 hover:-translate-y-0.5 transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                Submit Request
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Bottom CTA -->
                <div class="relative overflow-hidden p-12 lg:p-20 rounded-[3rem] text-center text-white" style="background: linear-gradient(135deg, #4338CA 0%, #6D28D9 50%, #4338CA 100%); box-shadow: 0 30px 60px -15px rgba(99,102,241,0.5);">
                    <!-- Glow Orbs -->
                    <div class="absolute top-0 right-0 w-80 h-80 rounded-full blur-[100px] opacity-25" style="background: #6366F1;"></div>
                    <div class="absolute bottom-0 left-0 w-80 h-80 rounded-full blur-[100px] opacity-20" style="background: #2DD4BF;"></div>
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                    <div class="relative max-w-3xl mx-auto space-y-8">
                        <h2 class="text-4xl lg:text-5xl font-black leading-tight" style="color: #ffffff;">No Patient Gets Left Behind.</h2>
                        <p class="text-lg" style="color: #D1D5DB;">Our commitment: if you need care, we'll find a way to make it happen. Reach out today.</p>
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="{{ route('register') }}" class="px-10 py-5 font-black rounded-2xl shadow-xl hover:-translate-y-1 transition-all" style="background: #2DD4BF; color: #1e1b4b;">Register as Patient</a>
                            <a href="{{ route('about') }}" class="px-10 py-5 font-black rounded-2xl hover:bg-white/20 transition-all" style="background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); color: #ffffff;">Learn About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <x-footer />
    </div>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes staggered-up {
            from { opacity: 0; transform: translateY(40px) scale(0.97); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        .animate-fade-in { animation: fade-in 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .animate-staggered-up { animation: staggered-up 1.2s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .text-gradient {
            background: linear-gradient(135deg, #2563eb 0%, #4f46e5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</body>

</html>
