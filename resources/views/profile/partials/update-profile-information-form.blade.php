<section class="space-y-10">
    <header class="border-b border-slate-50 pb-8">
        <h2 class="text-2xl font-black text-slate-900 tracking-tight">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-2 text-sm font-bold text-slate-400 uppercase tracking-widest">
            {{ __("Update your account's public identity and contact email.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-8">
        @csrf
        @method('patch')

        <div class="space-y-2">
            <x-input-label for="name" :value="__('Full Name')"
                class="ml-2 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]" />
            <input id="name" name="name" type="text"
                class="w-full bg-slate-50/50 border-slate-100 border focus:border-[hsl(var(--hospital-primary))] focus:bg-white rounded-2xl px-6 py-4 focus:ring-4 focus:ring-blue-500/5 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-300 tracking-tight"
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="email" :value="__('Email Address')"
                class="ml-2 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]" />
            <input id="email" name="email" type="email"
                class="w-full bg-slate-50/50 border-slate-100 border focus:border-[hsl(var(--hospital-primary))] focus:bg-white rounded-2xl px-6 py-4 focus:ring-4 focus:ring-blue-500/5 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-300 tracking-tight"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-orange-50 rounded-2xl border border-orange-100">
                    <p class="text-xs font-bold text-orange-600 tracking-tight">
                        {{ __('Your email address is currently unverified.') }}

                        <button form="send-verification" class="ml-2 underline hover:text-orange-800 transition-colors">
                            {{ __('Resend verification link') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-black text-[10px] text-green-600 uppercase tracking-widest">
                            {{ __('✓ Verification link dispatched.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-6 pt-4">
            <button type="submit"
                class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-[hsl(var(--hospital-primary))] to-[hsl(var(--hospital-secondary))] text-white px-10 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl shadow-blue-500/20 hover:shadow-blue-500/40 hover:-translate-y-1 transition-all duration-300 active:scale-95 group">
                <span>{{ __('Save Profile') }}</span>
                <svg class="w-4 h-4 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                </svg>
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-[11px] font-black text-green-500 uppercase tracking-widest">{{ __('Changes Saved') }}</p>
            @endif
        </div>
    </form>
</section>