<x-guest-layout>
    <div
        class="max-w-md w-full mx-auto space-y-8 bg-white p-10 rounded-[3rem] shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)] border border-slate-50 relative">
        <div class="text-center space-y-2">
            <h2 class="text-3xl font-black text-[hsl(var(--hospital-header))] tracking-tight">Verify Email</h2>
            <p class="text-sm font-semibold text-slate-500">We've sent a 6-digit code to your email.</p>
        </div>

        @if(session('testing_otp'))
            <x-alert type="info" message="Testing Mode OTP: {{ session('testing_otp') }}" />
        @endif

        <form method="POST" action="{{ route('verification.verify') }}" class="space-y-6">
            @csrf
            <div>
                <x-input id="otp_code"
                    class="block w-full text-center text-3xl tracking-[0.7em] font-black py-6 rounded-2xl" type="text"
                    name="otp_code" required autofocus autocomplete="off" placeholder="••••••" maxlength="6" />
                <x-input-error :messages="$errors->get('otp_code')" class="mt-2 text-center" />
            </div>

            <x-button variant="primary" class="w-full text-lg shadow-xl shadow-blue-500/20 py-4 justify-center">
                Verify Account
            </x-button>
        </form>

        <form method="POST" action="{{ route('verification.send') }}" class="text-center">
            @csrf
            <button type="submit"
                class="text-sm font-bold text-slate-500 hover:text-[hsl(var(--hospital-primary))] transition-colors bg-transparent border-0 p-0 underline decoration-slate-300 hover:decoration-blue-600 underline-offset-4">
                Didn't receive code? Resend
            </button>
        </form>
    </div>
</x-guest-layout>