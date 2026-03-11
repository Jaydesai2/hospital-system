<x-dashboard-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight">Account <span
                        class="text-[hsl(var(--hospital-primary))]">Settings</span></h2>
                <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-[0.2em]">Manage your personal
                    information and security</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto py-10 space-y-12">
        <div
            class="bg-white rounded-[3rem] shadow-[0_30px_60px_-20px_rgba(0,0,0,0.04)] border border-slate-50 p-10 md:p-16 relative overflow-hidden group">
            <div
                class="absolute -right-10 -top-10 w-40 h-40 bg-blue-50/50 rounded-full blur-3xl group-hover:scale-150 transition-all duration-700">
            </div>
            <div class="relative max-w-2xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div
            class="bg-white rounded-[3rem] shadow-[0_30px_60px_-20px_rgba(0,0,0,0.04)] border border-slate-50 p-10 md:p-16 relative overflow-hidden group">
            <div
                class="absolute -right-10 -top-10 w-40 h-40 bg-indigo-50/50 rounded-full blur-3xl group-hover:scale-150 transition-all duration-700">
            </div>
            <div class="relative max-w-2xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="bg-rose-50/30 rounded-[3rem] border border-rose-100 p-10 md:p-16 relative overflow-hidden group">
            <div class="relative max-w-2xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-dashboard-layout>