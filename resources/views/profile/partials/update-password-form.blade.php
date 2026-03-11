<section class="space-y-10">
    <header class="border-b border-slate-50 pb-8">
        <h2 class="text-2xl font-black text-slate-900 tracking-tight">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-2 text-sm font-bold text-slate-400 uppercase tracking-widest">
            {{ __('Ensure your account is protected with a high-entropy security key.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-8">
        @csrf
        @method('put')

        <div class="space-y-2">
            <x-input-label for="update_password_current_password" :value="__('Current Password')"
                class="ml-2 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]" />
            <div class="relative group">
                <span
                    class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-[hsl(var(--hospital-primary))] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                </span>
                <input id="update_password_current_password" name="current_password" type="password"
                    class="w-full bg-slate-50/50 border-slate-100 border focus:border-[hsl(var(--hospital-primary))] focus:bg-white rounded-2xl pl-16 pr-8 py-4 focus:ring-4 focus:ring-blue-500/5 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-300 tracking-tight"
                    placeholder="••••••••" autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="space-y-2">
            <x-input-label for="update_password_password" :value="__('New Security Key')"
                class="ml-2 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]" />
            <div class="relative group">
                <span
                    class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-[hsl(var(--hospital-primary))] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z">
                        </path>
                    </svg>
                </span>
                <input id="update_password_password" name="password" type="password"
                    class="w-full bg-slate-50/50 border-slate-100 border focus:border-[hsl(var(--hospital-primary))] focus:bg-white rounded-2xl pl-16 pr-8 py-4 focus:ring-4 focus:ring-blue-500/5 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-300 tracking-tight"
                    placeholder="Min. 8 characters" autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="space-y-2">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Security Key')"
                class="ml-2 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]" />
            <div class="relative group">
                <span
                    class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-[hsl(var(--hospital-primary))] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                        </path>
                    </svg>
                </span>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="w-full bg-slate-50/50 border-slate-100 border focus:border-[hsl(var(--hospital-primary))] focus:bg-white rounded-2xl pl-16 pr-8 py-4 focus:ring-4 focus:ring-blue-500/5 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-300 tracking-tight"
                    placeholder="Repeat password" autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-6 pt-4">
            <button type="submit"
                class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-slate-900 to-slate-800 text-white px-10 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl shadow-slate-900/10 hover:shadow-slate-900/20 hover:-translate-y-1 transition-all duration-300 active:scale-95 group">
                <span>{{ __('Update Key') }}</span>
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                    </path>
                </svg>
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-[11px] font-black text-green-500 uppercase tracking-widest">{{ __('Key Updated') }}</p>
            @endif
        </div>
    </form>
</section>