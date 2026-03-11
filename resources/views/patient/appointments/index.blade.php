<x-dashboard-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight">Visit <span
                        class="text-[hsl(var(--hospital-primary))]">History</span></h2>
                <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-[0.2em]">Your medical appointment
                    timeline</p>
            </div>
            <a href="{{ route('patient.doctors') }}"
                class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-[hsl(var(--hospital-primary))] to-[hsl(var(--hospital-secondary))] text-white px-8 py-4 rounded-2xl font-black text-sm uppercase tracking-[0.2em] shadow-xl shadow-blue-500/20 hover:shadow-blue-500/40 hover:-translate-y-1 transition-all duration-300 group">
                <svg class="w-5 h-5 group-hover:-translate-y-1 group-hover:translate-x-1 transition-transform"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                <span>Book Appointment</span>
            </a>
        </div>
    </x-slot>

    <div
        class="bg-white rounded-[3rem] shadow-[0_30px_60px_-20px_rgba(0,0,0,0.04)] border border-slate-50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-white">
                        <th class="px-5 py-6">
                            <button class="w-full flex items-center justify-between px-5 py-3 rounded-2xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white hover:shadow-sm transition-all duration-300 group">
                                <span class="text-[10px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Medical Expert</span>
                                <svg class="w-3.5 h-3.5 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                            </button>
                        </th>
                        <th class="px-5 py-6">
                            <button class="w-full flex items-center justify-between px-5 py-3 rounded-2xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white hover:shadow-sm transition-all duration-300 group">
                                <span class="text-[10px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Schedule</span>
                                <svg class="w-3.5 h-3.5 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                            </button>
                        </th>
                        <th class="px-5 py-6">
                            <button class="w-full flex items-center justify-between px-5 py-3 rounded-2xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white hover:shadow-sm transition-all duration-300 group">
                                <span class="text-[10px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Clinical Status</span>
                                <svg class="w-3.5 h-3.5 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                            </button>
                        </th>
                        <th class="px-5 py-6">
                            <button class="w-full flex items-center justify-between px-5 py-3 rounded-2xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white hover:shadow-sm transition-all duration-300 group">
                                <span class="text-[10px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Observation / Reason</span>
                                <svg class="w-3.5 h-3.5 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($appointments as $appointment)
                        <tr class="hover:bg-slate-50/50 transition-all duration-300 group">
                            <td class="px-10 py-7">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-blue-50 to-indigo-50 border border-white flex items-center justify-center text-[hsl(var(--hospital-primary))] font-black text-lg shadow-sm group-hover:scale-110 transition-transform">
                                        Dr
                                    </div>
                                    <div>
                                        <h4 class="font-black text-slate-900 text-base tracking-tight leading-tight">Dr.
                                            {{ $appointment->doctor->user->name ?? 'Unknown Doctor' }}</h4>
                                        <p
                                            class="text-xs font-bold text-[hsl(var(--hospital-primary))] uppercase tracking-widest mt-0.5">
                                            {{ $appointment->doctor->specialization }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-7">
                                <div class="space-y-1">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span
                                            class="text-slate-900 font-black text-sm tracking-tight">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 ml-1">
                                        <div class="w-1 h-1 rounded-full bg-slate-300"></div>
                                        <span
                                            class="text-slate-400 text-[11px] font-bold uppercase tracking-widest">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-7">
                                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-[0.15em] ring-1 shadow-sm
                                        {{ $appointment->status === 'requested' ? 'bg-orange-50 text-orange-600 ring-orange-100' : '' }}
                                        {{ $appointment->status === 'confirmed' ? 'bg-green-50 text-green-600 ring-green-100' : '' }}
                                        {{ $appointment->status === 'completed' ? 'bg-blue-50 text-blue-600 ring-blue-100' : '' }}
                                        {{ $appointment->status === 'cancelled' ? 'bg-red-50 text-red-600 ring-red-100' : '' }}
                                    ">
                                    {{ $appointment->status }}
                                </span>
                            </td>
                            <td class="px-10 py-7">
                                <p
                                    class="text-slate-500 text-sm font-medium italic opacity-70 group-hover:opacity-100 transition-opacity">
                                    "{{ $appointment->reason ?? 'Routine check-up' }}"
                                </p>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-10 py-32 text-center">
                                <div class="flex flex-col items-center gap-4">
                                    <div
                                        class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center text-slate-200">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-slate-400 font-black text-[11px] uppercase tracking-[0.3em]">No Visit
                                        History Found</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>