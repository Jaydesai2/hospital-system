<section class="space-y-10">
    <header class="border-b border-rose-100 pb-8">
        <h2 class="text-2xl font-black text-rose-600 tracking-tight">
            {{ __('Danger Zone') }}
        </h2>

        <p class="mt-2 text-sm font-bold text-slate-400 uppercase tracking-widest">
            {{ __('Permanent account termination and data erasure.') }}
        </p>
    </header>

    <div class="max-w-xl">
        <p class="text-sm font-medium text-slate-500 leading-relaxed mb-8">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>

        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="inline-flex items-center justify-center gap-3 bg-white border-2 border-rose-100 text-rose-500 px-10 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-rose-500 hover:text-white hover:border-rose-500 hover:shadow-xl hover:shadow-rose-500/20 transition-all duration-300 active:scale-95 group">
            <span>{{ __('Delete Account') }}</span>
            <svg class="w-4 h-4 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                </path>
            </svg>
        </button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-12 space-y-10">
            @csrf
            @method('delete')

            <header>
                <h2 class="text-2xl font-black text-slate-900 tracking-tight">
                    {{ __('Confirm Account Deletion') }}
                </h2>

                <p class="mt-2 text-sm font-bold text-slate-400 uppercase tracking-widest">
                    {{ __('This action is irreversible.') }}
                </p>
            </header>

            <p class="text-sm font-medium text-slate-500 leading-relaxed">
                {{ __('Please enter your password to confirm you would like to permanently delete your account. All clinical records and personal data associated with this profile will be purged from HealthSync.') }}
            </p>

            <div class="space-y-3">
                <x-input-label for="password" value="{{ __('Confirm Password') }}"
                    class="ml-2 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]" />

                <input id="password" name="password" type="password"
                    class="w-full bg-slate-50/50 border-slate-100 border focus:border-rose-500 focus:bg-white rounded-2xl px-6 py-4 focus:ring-4 focus:ring-rose-500/5 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-300 tracking-tight"
                    placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="flex flex-col md:flex-row items-center justify-end gap-6 pt-6">
                <button type="button" x-on:click="$dispatch('close')"
                    class="text-sm font-black text-slate-400 hover:text-slate-600 uppercase tracking-widest transition-all">
                    {{ __('Discard') }}
                </button>

                <button type="submit"
                    class="w-full md:w-auto inline-flex items-center justify-center gap-3 bg-rose-500 text-white px-10 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl shadow-rose-500/20 hover:shadow-rose-500/40 hover:-translate-y-1 transition-all duration-300 active:scale-95 group">
                    <span>{{ __('Finalize Deletion') }}</span>
                    <svg class="w-4 h-4 group-hover:shake transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                        </path>
                    </svg>
                </button>
            </div>
        </form>
    </x-modal>
</section>