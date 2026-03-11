@if (session('success') || session('error'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-y-[-10px] scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-[-10px] scale-95"
        class="fixed top-6 right-6 z-[100] flex flex-col gap-3">

        @if (session('success'))
            <div class="bg-white/90 backdrop-blur-xl border border-teal-100 p-4 rounded-2xl shadow-xl shadow-teal-500/10 flex items-start gap-4 max-w-sm"
                role="alert">
                <div class="w-10 h-10 rounded-full bg-teal-50 flex items-center justify-center shrink-0 border border-teal-100">
                    <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="pt-0.5">
                    <h4 class="text-sm font-black text-slate-900 tracking-tight">Success</h4>
                    <p class="text-xs font-semibold text-slate-500 mt-0.5 leading-relaxed">{{ session('success') }}</p>
                </div>
                <button @click="show = false" class="ml-auto text-slate-400 hover:text-slate-600 transition-colors p-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-white/90 backdrop-blur-xl border border-red-100 p-4 rounded-2xl shadow-xl shadow-red-500/10 flex items-start gap-4 max-w-sm"
                role="alert">
                <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center shrink-0 border border-red-100">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                </div>
                <div class="pt-0.5">
                    <h4 class="text-sm font-black text-slate-900 tracking-tight">Action Required</h4>
                    <p class="text-xs font-semibold text-slate-500 mt-0.5 leading-relaxed">{{ session('error') }}</p>
                </div>
                <button @click="show = false" class="ml-auto text-slate-400 hover:text-slate-600 transition-colors p-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        @endif
    </div>
@endif