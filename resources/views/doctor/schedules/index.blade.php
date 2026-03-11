<x-dashboard-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight">Clinical <span
                        class="text-[hsl(var(--hospital-primary))]">Schedule</span></h2>
                <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-[0.2em]">Manage your weekly
                    availability</p>
            </div>
            <a href="/doctor/schedules/create"
                class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-[hsl(var(--hospital-primary))] to-[hsl(var(--hospital-secondary))] text-white px-8 py-4 rounded-2xl font-black text-sm uppercase tracking-[0.2em] shadow-xl shadow-blue-500/20 hover:shadow-blue-500/40 hover:-translate-y-1 transition-all duration-300 group">
                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Add Time Slot</span>
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
                            <button
                                class="w-full flex items-center justify-between px-5 py-3 rounded-2xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white transition-all duration-300 group">
                                <span
                                    class="text-[10px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Operating
                                    Day</span>
                                <svg class="w-3.5 h-3.5 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))] transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                            </button>
                        </th>
                        <th class="px-5 py-6">
                            <button
                                class="w-full flex items-center justify-between px-5 py-3 rounded-2xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white transition-all duration-300 group">
                                <span
                                    class="text-[10px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Shift
                                    Start</span>
                                <svg class="w-3.5 h-3.5 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))] transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                            </button>
                        </th>
                        <th class="px-5 py-6">
                            <button
                                class="w-full flex items-center justify-between px-5 py-3 rounded-2xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white transition-all duration-300 group">
                                <span
                                    class="text-[10px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Shift
                                    End</span>
                                <svg class="w-3.5 h-3.5 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))] transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                            </button>
                        </th>
                        <th class="px-5 py-6 text-right">
                            <div class="w-full flex items-center justify-end px-5 py-3">
                                <span
                                    class="text-[10px] font-black text-slate-300 uppercase tracking-[0.2em]">Actions</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($schedules as $schedule)
                        <tr class="hover:bg-slate-50/50 transition-all duration-300 group">
                            <td class="px-10 py-7">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center text-[hsl(var(--hospital-primary))] font-black text-xs uppercase tracking-tight group-hover:scale-110 transition-transform shadow-sm">
                                        {{ substr($schedule->day, 0, 3) }}
                                    </div>
                                    <span
                                        class="font-black text-slate-900 text-base tracking-tight">{{ $schedule->day }}</span>
                                </div>
                            </td>
                            <td class="px-10 py-7">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span
                                        class="text-slate-900 font-black text-sm tracking-tight">{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}</span>
                                </div>
                            </td>
                            <td class="px-10 py-7">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span
                                        class="text-slate-900 font-black text-sm tracking-tight">{{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}</span>
                                </div>
                            </td>
                            <td class="px-10 py-7 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <form action="/doctor/schedules/{{ $schedule->id }}/delete" method="POST"
                                        onsubmit="return confirm('Are you sure you want to remove this shift?');">
                                        @csrf
                                        <button type="submit"
                                            class="w-10 h-10 flex items-center justify-center text-rose-500 bg-white border border-slate-100 rounded-xl hover:bg-rose-500 hover:text-white hover:border-rose-500 hover:shadow-lg hover:shadow-rose-500/20 transition-all duration-300"
                                            title="Delete Slot">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
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
                                    <p class="text-slate-400 font-black text-[11px] uppercase tracking-[0.3em]">No Active
                                        Schedule slots</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>