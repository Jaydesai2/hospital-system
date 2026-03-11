<x-guest-layout>
    <x-slot name="maxWidth">sm:max-w-6xl</x-slot>
    <x-slot name="padding">p-0</x-slot>

    <div class="grid md:grid-cols-2 lg:grid-cols-2 min-h-[700px] overflow-hidden rounded-[3rem]">
        <!-- Illustration Sidebar -->
        <div class="hidden md:block relative bg-slate-950 overflow-hidden">
            <img src="{{ asset('images/login_bg.jpg') }}" alt="Secure Login"
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
                        class="inline-block px-4 py-1.5 bg-blue-500/20 border border-blue-500/30 rounded-full text-[10px] font-black uppercase tracking-[0.2em] text-blue-300 mb-6">Secure
                        Access</span>
                    <h3 class="text-4xl font-black mb-6 tracking-tighter leading-tight">Your Health, <br><span
                            class="text-blue-400">Our Priority</span></h3>
                    <p class="text-slate-300 text-lg leading-relaxed mb-0 font-medium opacity-80">Access your secure
                        medical dashboard, view appointments, and manage your health journey with confidence.</p>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="p-10 lg:p-20 bg-white flex flex-col justify-center">
            <div class="mb-12">
                <h2 class="text-4xl font-black text-slate-900 mb-4 tracking-tighter">Welcome Back</h2>
                <p class="text-slate-400 font-bold text-[11px] uppercase tracking-[0.3em] opacity-60">Authorize your
                    secure access</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-6" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-8">
                @csrf

                <!-- Email Address -->
                <div class="space-y-2">
                    <x-input-label for="email" :value="__('Email Address')"
                        class="ml-1 text-slate-400 uppercase tracking-widest text-[11px] font-black" />
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-[hsl(var(--hospital-primary))] transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <x-input id="email" type="email" name="email" :value="old('email')" required autofocus
                            autocomplete="username"
                            class="pl-14 pr-6 py-4 bg-slate-50 border-transparent font-bold text-slate-900 placeholder-slate-300 shadow-none !ring-0 border-none"
                            placeholder="Enter your email" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="space-y-2" x-data="{ show: false }">
                    <x-input-label for="password" :value="__('Password')"
                        class="ml-1 text-slate-400 uppercase tracking-widest text-[11px] font-black" />
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-[hsl(var(--hospital-primary))] transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        <x-input id="password" name="password" required autocomplete="current-password"
                            ::type="show ? 'text' : 'password'"
                            class="pl-14 pr-12 py-4 bg-slate-50 border-transparent font-bold text-slate-900 placeholder-slate-300 shadow-none !ring-0 border-none"
                            placeholder="Enter your password" />
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-[hsl(var(--hospital-primary))] transition-colors"
                            :aria-label="show ? 'Hide password' : 'Show password'">
                            <svg x-show="!show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="show" x-cloak class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 1.274-4.057 5.064-7 9.542-7 1.258 0 2.443.23 3.536.648M19.542 12A9.998 9.998 0 0112 19c-1.258 0-2.443-.23-3.536-.648M12 9c-1.105 0-2 .895-2 2 0 .151.017.298.05.44M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between px-1">
                    <!-- Remember Me -->
                    <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                        <div class="relative flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="w-5 h-5 rounded-lg border-slate-200 text-blue-600 shadow-sm focus:ring-blue-600 transition-all duration-300"
                                name="remember">
                        </div>
                        <span
                            class="ms-3 text-sm font-bold text-slate-400 group-hover:text-blue-600 transition-colors tracking-tight">{{ __('Keep me signed in') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm font-black text-blue-600 hover:text-indigo-600 transition-colors"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <x-button variant="primary" type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 py-5 rounded-2xl font-black uppercase tracking-[0.2em] shadow-xl shadow-blue-500/20 hover:shadow-blue-500/40 group">
                    <span>{{ __('Log In') }}</span>
                    <svg class="ml-3 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </x-button>

                @if (Route::has('register'))
                    <div class="text-center mt-12 pt-8 border-t border-slate-100">
                        <p class="text-slate-400 font-bold text-sm tracking-tight">
                            New to HealthSync?
                            <a href="{{ route('register') }}"
                                class="font-black text-blue-600 hover:text-indigo-600 transition-colors ml-1">Create
                                an account</a>
                        </p>
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-guest-layout>