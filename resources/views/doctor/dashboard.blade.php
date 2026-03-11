<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight">Doctor <span
                class="text-[hsl(var(--hospital-primary))]">Dashboard</span></h2>
    </x-slot>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mb-12">
        <!-- Stats Card: Appointments -->
        <a href="{{ route('doctor.dashboard', ['filter' => 'all']) }}" class="card-medical p-6 md:p-8 flex flex-col md:flex-row items-center justify-between group relative transition-all duration-300 {{ $filter === 'all' ? 'border-2 border-[hsl(var(--hospital-primary))]' : 'hover:border-[hsl(var(--hospital-primary))]' }}">
            @if($filter === 'all')
            <div class="absolute top-4 right-4 animate-pulse">
                <span class="w-2.5 h-2.5 bg-blue-500 rounded-full block shadow-lg shadow-blue-500/50"></span>
            </div>
            @endif
            <div class="flex flex-col md:flex-row items-center gap-4 md:gap-6 text-center md:text-left">
                <div class="w-14 h-14 md:w-16 md:h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-[hsl(var(--hospital-primary))] group-hover:bg-[hsl(var(--hospital-primary))] group-hover:text-white transition-all duration-500 shrink-0">
                    <svg class="w-7 h-7 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-1">Total Schedule</p>
                    <h3 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight">{{ $stats['total_appointments'] }}</h3>
                </div>
            </div>
        </a>

        <!-- Stats Card: Today -->
        <a href="{{ route('doctor.dashboard', ['filter' => 'today']) }}" class="card-medical p-6 md:p-8 flex flex-col md:flex-row items-center justify-between group relative transition-all duration-300 {{ $filter === 'today' ? 'border-2 border-[hsl(var(--hospital-primary))]' : 'hover:border-teal-500' }}">
            @if($filter === 'today')
            <div class="absolute top-4 right-4 animate-pulse">
                <span class="w-2.5 h-2.5 bg-blue-500 rounded-full block shadow-lg shadow-blue-500/50"></span>
            </div>
            @endif
            <div class="flex flex-col md:flex-row items-center gap-4 md:gap-6 text-center md:text-left">
                <div class="w-14 h-14 md:w-16 md:h-16 bg-teal-50 rounded-2xl flex items-center justify-center text-teal-600 group-hover:bg-teal-600 group-hover:text-white transition-all duration-500 shrink-0">
                    <svg class="w-7 h-7 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-1">Upcoming Today</p>
                    <h3 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight">{{ $stats['upcoming_today'] }}</h3>
                </div>
            </div>
        </a>

        <!-- Stats Card: Patients -->
        <a href="{{ route('doctor.dashboard', ['filter' => 'patients']) }}" class="card-medical p-6 md:p-8 flex flex-col md:flex-row items-center justify-between group relative transition-all duration-300 {{ $filter === 'patients' ? 'border-2 border-[hsl(var(--hospital-primary))]' : 'hover:border-purple-500' }}">
            @if($filter === 'patients')
            <div class="absolute top-4 right-4 animate-pulse">
                <span class="w-2.5 h-2.5 bg-blue-500 rounded-full block shadow-lg shadow-blue-500/50"></span>
            </div>
            @endif
            <div class="flex flex-col md:flex-row items-center gap-4 md:gap-6 text-center md:text-left">
                <div class="w-14 h-14 md:w-16 md:h-16 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-all duration-500 shrink-0">
                    <svg class="w-7 h-7 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-1">Unique Patients</p>
                    <h3 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight">{{ $stats['total_patients'] }}</h3>
                </div>
            </div>
        </a>
    </div>

    <div class="grid lg:grid-cols-3 gap-6 lg:gap-10">
        <!-- Upcoming Appointments -->
        <div class="lg:col-span-2 card-medical !p-0 overflow-hidden">
            <div class="p-8 border-b border-slate-50 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-slate-900">
                        {{ $filter === 'patients' ? 'Patient History' : 'Nearby Consultations' }}
                    </h3>
                    <p class="text-sm font-medium text-slate-400">
                        {{ $filter === 'patients' ? 'Most recent completed sessions for unique patients' : 'Your upcoming sessions for the next 48 hours' }}
                    </p>
                </div>
                <a href="/doctor/appointments"
                    class="text-xs font-bold text-[hsl(var(--hospital-primary))] uppercase tracking-widest hover:underline">View
                    All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-white">
                            <th class="px-2 py-6">
                                <button class="w-full flex items-center justify-between px-3 py-3 rounded-2xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white transition-all duration-300 group">
                                    <span class="text-[10px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Patient Details</span>
                                    <svg class="w-3.5 h-3.5 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </button>
                            </th>
                            <th class="px-2 py-6">
                                <button class="w-full flex items-center justify-between px-3 py-3 rounded-2xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white transition-all duration-300 group">
                                    <span class="text-[10px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Schedule</span>
                                    <svg class="w-3.5 h-3.5 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </button>
                            </th>
                            <th class="px-2 py-6">
                                <button class="w-full flex items-center justify-between px-3 py-3 rounded-2xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white transition-all duration-300 group">
                                    <span class="text-[10px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Status</span>
                                    <svg class="w-3.5 h-3.5 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </button>
                            </th>
                            <th class="px-2 py-6">
                                <div class="w-full flex items-center justify-end px-3 py-3">
                                    <span class="text-[10px] font-black text-slate-300 uppercase tracking-[0.2em]">Action</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($appointments as $appointment)
                            <tr class="hover:bg-slate-50/30 transition-colors group text-sm">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-[hsl(var(--hospital-primary))] font-bold text-sm">
                                            {{ substr($appointment->patient->user->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900 capitalize">
                                                {{ $appointment->patient->user->name }}</p>
                                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">ID:
                                                #{{ str_pad($appointment->patient->id, 4, '0', STR_PAD_LEFT) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 lg:px-8 py-5">
                                    <p class="text-slate-900 font-bold tracking-tight">
                                        {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('D, M d') }}</p>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                                        {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</p>
                                </td>
                                <td class="px-8 py-5">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                                        {{ $appointment->status === 'requested' ? 'bg-orange-50 text-orange-600' : '' }}
                                        {{ $appointment->status === 'confirmed' ? 'bg-blue-50 text-blue-600' : '' }}
                                        {{ $appointment->status === 'completed' ? 'bg-emerald-50 text-emerald-600' : '' }}
                                    ">{{ $appointment->status }}</span>
                                </td>
                                <td class="px-4 lg:px-8 py-5 text-right">
                                    <a href="{{ route('doctor.appointments.show', $appointment->id) }}"
                                        class="text-[10px] font-bold text-[hsl(var(--hospital-primary))] uppercase tracking-widest hover:underline">Details</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-8 py-20 text-center">
                                    <p class="text-slate-400 font-bold text-sm tracking-widest uppercase">No upcoming
                                        sessions</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-10">
            <div
                class="bg-slate-900 rounded-[2.5rem] p-8 text-white relative overflow-hidden group shadow-2xl shadow-slate-950/20">
                <div
                    class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/5 rounded-full blur-2xl group-hover:scale-150 transition-all duration-700">
                </div>
                <div class="relative z-10">
                    <span class="text-[10px] font-bold text-rose-400 uppercase tracking-widest mb-4 block">Medical
                        Focus</span>
                    <h3 class="text-xl font-bold mb-4 leading-tight">Holistic Patient <span
                            class="text-rose-400">Diagnosis</span></h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-8 font-medium">Review history and records before
                        every clinical session.</p>
                    <div class="flex items-center gap-3">
                        <div class="flex -space-x-2">
                            <div
                                class="w-8 h-8 rounded-full border-2 border-slate-900 bg-slate-800 flex items-center justify-center font-bold text-[8px]">
                                MK</div>
                            <div
                                class="w-8 h-8 rounded-full border-2 border-slate-900 bg-slate-700 flex items-center justify-center font-bold text-[8px]">
                                AS</div>
                        </div>
                        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">+2 Team Docs</p>
                    </div>
                </div>
            </div>

            <div class="card-medical">
                <h3 class="text-lg font-bold text-slate-900 mb-8">Clinic Tools</h3>
                <div class="space-y-4">
                    <a href="/doctor/schedules/create"
                        class="flex items-center gap-4 p-4 rounded-2xl border border-slate-50 hover:border-blue-100 hover:bg-blue-50/50 transition-all duration-300 group">
                        <div
                            class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-[hsl(var(--hospital-primary))] group-hover:bg-[hsl(var(--hospital-primary))] group-hover:text-white transition-all duration-300 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-slate-900 text-sm">Availability</p>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Manage Slots</p>
                        </div>
                    </a>
                    <a href="#"
                        class="flex items-center gap-4 p-4 rounded-2xl border border-slate-50 hover:border-purple-100 hover:bg-purple-50/50 transition-all duration-300 group">
                        <div
                            class="w-10 h-10 bg-purple-50 rounded-xl flex items-center justify-center text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-slate-900 text-sm">Prescription</p>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Digital Archive
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>