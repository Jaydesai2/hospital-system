<x-guest-layout>
    <x-slot name="maxWidth">sm:max-w-6xl</x-slot>
    <x-slot name="padding">p-0</x-slot>

    <div class="grid md:grid-cols-2 lg:grid-cols-2 min-h-[750px] overflow-hidden rounded-[3rem]">
        <!-- Illustration Sidebar -->
        <div class="hidden md:block relative bg-slate-950 overflow-hidden">
            <img src="{{ asset('images/register_bg.jpg') }}" alt="Join HealthSync"
                class="absolute inset-0 w-full h-full object-cover opacity-60">
            <div
                class="absolute inset-0 bg-gradient-to-br from-blue-600/40 via-slate-950/80 to-indigo-950 mix-blend-multiply">
            </div>

            <div class="relative h-full flex flex-col justify-end p-16 text-white">

                <div
                    class="bg-white/10 backdrop-blur-3xl rounded-[2.5rem] p-10 border border-white/10 shadow-2xl relative overflow-hidden group">
                    <div
                        class="absolute -right-10 -bottom-10 w-32 h-32 bg-blue-500/20 rounded-full blur-3xl group-hover:scale-150 transition-all duration-700">
                    </div>
                    <span
                        class="inline-block px-4 py-1.5 bg-blue-500/20 border border-blue-500/30 rounded-full text-[10px] font-black uppercase tracking-[0.2em] text-blue-300 mb-6">Patient-First
                        Platform</span>
                    <h3 class="text-4xl font-black mb-6 tracking-tighter leading-tight">Empowering your <br><span
                            class="text-blue-400">Health Journey</span></h3>
                    <p class="text-slate-300 text-lg leading-relaxed mb-0 font-medium opacity-80">Join 15,000+ patients
                        who trust HealthSync for secure, personalized, and efficient medical care coordination.</p>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="p-10 lg:p-20 bg-white flex flex-col justify-center">
            <div class="mb-12">
                <h2 class="text-4xl font-black text-[hsl(var(--hospital-header))] mb-4 tracking-tighter">Create Account
                </h2>
                <p class="text-slate-400 font-black text-[11px] uppercase tracking-[0.3em]">Join the digital medical
                    revolution</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-8">
                @csrf

                <!-- Name & Email -->
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <x-input-label for="name" value="Full Name"
                            class="ml-1 text-slate-400 uppercase tracking-widest text-[10px] font-black" />
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-300 group-focus-within:text-blue-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <x-input id="name" name="name" type="text"
                                class="pl-14 pr-6 py-4 bg-slate-50 border-transparent font-bold text-slate-900 placeholder-slate-300 shadow-none !ring-0 border-none"
                                :value="old('name')" required autofocus placeholder="John Doe" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="space-y-2">
                        <x-input-label for="email" value="Email Address"
                            class="ml-1 text-slate-400 uppercase tracking-widest text-[10px] font-black" />
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-300 group-focus-within:text-[hsl(var(--hospital-primary))] transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <x-input id="email" name="email" type="email"
                                class="pl-14 pr-6 py-4 bg-slate-50 border-transparent font-bold text-slate-900 placeholder-slate-300 shadow-none !ring-0 border-none"
                                :value="old('email')" required placeholder="john@example.com" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <!-- Phone & DOB -->
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <x-input-label for="phone" value="Phone Number"
                            class="ml-1 text-slate-400 uppercase tracking-widest text-[10px] font-black" />
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-300 group-focus-within:text-blue-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <x-input id="phone" name="phone" type="text"
                                class="pl-14 pr-6 py-4 bg-slate-50 border-transparent font-bold text-slate-900 placeholder-slate-300 shadow-none !ring-0 border-none"
                                :value="old('phone')" required placeholder="+1 234 567 890" />
                        </div>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <div class="space-y-2">
                        <x-input-label for="dob" value="Date of Birth"
                            class="ml-1 text-slate-400 uppercase tracking-widest text-[10px] font-black" />
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-300 group-focus-within:text-blue-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <x-input id="dob" name="dob" type="date"
                                class="pl-14 pr-6 py-4 bg-slate-50 border-transparent font-bold text-slate-900 shadow-none !ring-0 border-none"
                                :value="old('dob')" required />
                        </div>
                        <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                    </div>
                </div>

                <!-- Address -->
                <div class="space-y-2">
                    <x-input-label for="address" value="Residential Address"
                        class="ml-1 text-slate-400 uppercase tracking-widest text-[10px] font-black" />
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-300 group-focus-within:text-blue-600 transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <x-input id="address" name="address" type="text"
                            class="pl-14 pr-6 py-4 bg-slate-50 border-transparent font-bold text-slate-900 placeholder-slate-300 shadow-none !ring-0 border-none"
                            :value="old('address')" required placeholder="Street, Building, Unit" />
                    </div>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <!-- Gender & Blood Group -->
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <x-input-label for="gender" value="Gender"
                            class="ml-1 text-slate-400 uppercase tracking-widest text-[10px] font-black" />
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-300 group-focus-within:text-blue-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <select name="gender" id="gender"
                                class="block w-full pl-14 pr-6 py-4 bg-slate-50 border-transparent focus:bg-white focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm transition-shadow outline-none font-bold text-slate-900 h-[60px] appearance-none cursor-pointer">
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>

                    <div class="space-y-2">
                        <x-input-label for="blood_group" value="Blood Group"
                            class="ml-1 text-slate-400 uppercase tracking-widest text-[10px] font-black" />
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-300 group-focus-within:text-blue-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <x-input id="blood_group" name="blood_group" type="text" placeholder="e.g. A+"
                                class="pl-14 pr-6 py-4 bg-slate-50 border-transparent font-bold text-slate-900 placeholder-slate-300 shadow-none !ring-0 border-none"
                                :value="old('blood_group')" required />
                        </div>
                        <x-input-error :messages="$errors->get('blood_group')" class="mt-2" />
                    </div>
                </div>

                <!-- Passwords -->
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-2" x-data="{ show: false }">
                        <x-input-label for="password" value="Password"
                            class="ml-1 text-slate-400 uppercase tracking-widest text-[10px] font-black" />
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-[hsl(var(--hospital-primary))] transition-colors" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </div>
                            <x-input id="password" name="password" ::type="show ? 'text' : 'password'"
                                class="pl-14 pr-12 py-4 bg-slate-50 border-transparent font-bold text-slate-900 placeholder-slate-300 shadow-none !ring-0 border-none"
                                required placeholder="••••••••" />
                            <button type="button" @click="show = !show"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-[hsl(var(--hospital-primary))] transition-colors"
                                :aria-label="show ? 'Hide password' : 'Show password'">
                                <svg x-show="!show" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg x-show="show" x-cloak class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 1.274-4.057 5.064-7 9.542-7 1.258 0 2.443.23 3.536.648M19.542 12A9.998 9.998 0 0112 19c-1.258 0-2.443-.23-3.536-.648M12 9c-1.105 0-2 .895-2 2 0 .151.017.298.05.44M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="space-y-2" x-data="{ show: false }">
                        <x-input-label for="password_confirmation" value="Confirm Password"
                            class="ml-1 text-slate-400 uppercase tracking-widest text-[10px] font-black" />
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-[hsl(var(--hospital-primary))] transition-colors" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </div>
                            <x-input id="password_confirmation" name="password_confirmation"
                                ::type="show ? 'text' : 'password'"
                                class="pl-14 pr-12 py-4 bg-slate-50 border-transparent font-bold text-slate-900 placeholder-slate-300 shadow-none !ring-0 border-none"
                                required placeholder="••••••••" />
                            <button type="button" @click="show = !show"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-[hsl(var(--hospital-primary))] transition-colors"
                                :aria-label="show ? 'Hide password' : 'Show password'">
                                <svg x-show="!show" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg x-show="show" x-cloak class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 1.274-4.057 5.064-7 9.542-7 1.258 0 2.443.23 3.536.648M19.542 12A9.998 9.998 0 0112 19c-1.258 0-2.443-.23-3.536-.648M12 9c-1.105 0-2 .895-2 2 0 .151.017.298.05.44M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-between gap-6 pt-8">
                    <a class="text-sm font-black text-slate-400 hover:text-[hsl(var(--hospital-primary))] transition-all flex items-center gap-2 group"
                        href="{{ route('login') }}">
                        <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                        </svg>
                        Already registered?
                    </a>

                    <x-button variant="primary" type="submit"
                        class="w-full sm:w-auto bg-gradient-to-r from-blue-600 to-teal-500 py-5 px-12 rounded-2xl font-black uppercase tracking-[0.2em] shadow-xl shadow-blue-500/20 hover:shadow-blue-500/40 group">
                        <span>Register Now</span>
                        <svg class="ml-3 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>