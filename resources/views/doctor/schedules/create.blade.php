<x-dashboard-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="/doctor/schedules"
                class="w-12 h-12 rounded-2xl bg-white border border-slate-100 flex items-center justify-center text-slate-400 hover:text-[hsl(var(--hospital-primary))] hover:border-blue-100 hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight">Define <span
                    class="text-[hsl(var(--hospital-primary))]">Shift</span></h2>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10">
        <form action="/doctor/schedules/store" method="POST"
            class="bg-white rounded-[3rem] shadow-[0_30px_60px_-20px_rgba(0,0,0,0.04)] border border-slate-50 p-12 md:p-16 space-y-16">
            @csrf

            <div class="space-y-12">
                <div class="border-b border-slate-50 pb-8">
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight">Schedule Alignment</h3>
                    <p class="text-sm font-bold text-slate-400 mt-1 uppercase tracking-widest">Set your technical
                        availability</p>
                </div>

                <div class="space-y-10">
                    <!-- Day Selection -->
                    <div class="space-y-3">
                        <label for="day"
                            class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Operating
                            Day</label>
                        <select name="day" id="day" required
                            class="w-full bg-slate-50/50 border-slate-100 border focus:border-[hsl(var(--hospital-primary))] focus:bg-white rounded-[1.5rem] px-8 py-5 focus:ring-4 focus:ring-blue-500/5 transition-all duration-300 font-bold text-slate-900 h-[64px]">
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div>

                    <div class="grid md:grid-cols-2 gap-10">
                        <!-- Start Time -->
                        <div class="space-y-3">
                            <label for="start_time"
                                class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Shift
                                Start</label>
                            <div class="relative group">
                                <span
                                    class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-[hsl(var(--hospital-primary))] transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                <input type="time" name="start_time" id="start_time" required
                                    class="w-full bg-slate-50/50 border-slate-100 border focus:border-[hsl(var(--hospital-primary))] focus:bg-white rounded-[1.5rem] pl-16 pr-8 py-5 focus:ring-4 focus:ring-blue-500/5 transition-all duration-300 font-bold text-slate-900 tracking-tight">
                            </div>
                        </div>

                        <!-- End Time -->
                        <div class="space-y-3">
                            <label for="end_time"
                                class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Shift
                                End</label>
                            <div class="relative group">
                                <span
                                    class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-[hsl(var(--hospital-primary))] transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                <input type="time" name="end_time" id="end_time" required
                                    class="w-full bg-slate-50/50 border-slate-100 border focus:border-[hsl(var(--hospital-primary))] focus:bg-white rounded-[1.5rem] pl-16 pr-8 py-5 focus:ring-4 focus:ring-blue-500/5 transition-all duration-300 font-bold text-slate-900 tracking-tight">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between pt-12 border-t border-slate-50">
                <a href="/doctor/schedules"
                    class="text-sm font-black text-slate-400 hover:text-slate-600 uppercase tracking-widest transition-all">Discard
                    Slot</a>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-[hsl(var(--hospital-primary))] to-[hsl(var(--hospital-secondary))] text-white px-12 py-5 rounded-[1.5rem] font-black text-sm uppercase tracking-[0.2em] shadow-xl shadow-blue-500/20 hover:shadow-blue-500/40 hover:-translate-y-1 transition-all duration-300 group">
                    <span>Activate Shift</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4">
                        </path>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</x-dashboard-layout>