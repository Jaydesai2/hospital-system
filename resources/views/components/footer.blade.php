<footer class="relative bg-slate-950 text-white pt-24 pb-12 overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-600/10 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-600/10 rounded-full blur-[120px]"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-20">
            <!-- Brand Section -->
            <div class="space-y-8">
                <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/20 group-hover:rotate-12 transition-all duration-500">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-white tracking-tight">Health<span
                            class="text-blue-500">Sync</span></span>
                </a>
                <p class="text-slate-400 leading-relaxed font-medium">
                    Redefining healthcare through innovation and compassion. Providing world-class medical services with
                    a personalized touch.
                </p>
                <div class="flex items-center gap-4">
                    @php
                        $socials = [
                            ['icon' => 'M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z', 'label' => 'Facebook'],
                            ['icon' => 'M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z', 'label' => 'Twitter'],
                            ['icon' => 'M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z M2 9h4v12H2z M4 2a2 2 0 110 4 2 2 0 010-4', 'label' => 'LinkedIn']
                        ];
                    @endphp
                    @foreach($socials as $social)
                        <a href="#"
                            class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:border-blue-500 hover:bg-blue-500/10 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $social['icon'] }}"></path>
                            </svg>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Medical Services -->
            <div class="space-y-8 lg:pl-12">
                <h3 class="text-lg font-bold text-white tracking-tight">Medical Services</h3>
                <ul class="space-y-4">
                    <li><a href="{{ url('/') }}#services"
                            class="text-slate-400 hover:text-blue-400 font-medium transition-colors">Specialized
                            Care</a></li>
                    <li><a href="{{ route('about') }}"
                            class="text-slate-400 hover:text-blue-400 font-medium transition-colors">About Our
                            Center</a></li>
                    <li><a href="{{ route('contactus.index') }}"
                            class="text-slate-400 hover:text-blue-400 font-medium transition-colors">Contact Us</a>
                    </li>
                    <li><a href="{{ route('register') }}"
                            class="text-slate-400 hover:text-blue-400 font-medium transition-colors">Book
                            Appointment</a></li>
                </ul>
            </div>

            <!-- Specialized Units -->
            <div class="space-y-8">
                <h3 class="text-lg font-bold text-white tracking-tight">Specialized Units</h3>
                <ul class="space-y-4">
                    <li><span class="text-slate-400 font-medium">Cardiovascular Unit</span></li>
                    <li><span class="text-slate-400 font-medium">Neurology Institute</span></li>
                    <li><span class="text-slate-400 font-medium">Pediatric Center</span></li>
                    <li><span class="text-slate-400 font-medium">Ophthalmology Clinic</span></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="space-y-8">
                <h3 class="text-lg font-bold text-white tracking-tight">Get In Touch</h3>
                <ul class="space-y-6">
                    <li class="flex items-start gap-4 group">
                        <div
                            class="w-10 h-10 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-500 border border-blue-500/20 mt-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-blue-500 uppercase tracking-widest mb-1">Our Location
                            </p>
                            <p class="text-slate-300 font-medium leading-relaxed">Medical Park 12, West Wing,
                                <br>Silicon Valley, CA
                            </p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4 group">
                        <div
                            class="w-10 h-10 rounded-xl bg-indigo-500/10 flex items-center justify-center text-indigo-500 border border-indigo-500/20 mt-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-indigo-500 uppercase tracking-widest mb-1">Emergency
                                Call</p>
                            <p class="text-slate-300 font-medium leading-relaxed">+1 (555) 000-1234</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="pt-12 border-t border-slate-900 flex flex-col md:flex-row items-center justify-between gap-6">
            <p class="text-slate-500 text-sm font-medium">
                © {{ date('Y') }} HealthSync Medical Group. All rights reserved.
            </p>
            <div class="flex items-center gap-8 text-sm font-medium">
                <a href="#" class="text-slate-500 hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="text-slate-500 hover:text-white transition-colors">Terms of Service</a>
                <a href="#" class="text-slate-500 hover:text-white transition-colors">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>