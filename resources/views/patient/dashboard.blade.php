<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight">My Health <span
                class="text-[hsl(var(--hospital-primary))]">Hub</span></h2>
    </x-slot>

    <div class="grid md:grid-cols-3 gap-8 mb-12">
        <!-- Stats Card: Total Visits -->
        <a href="{{ route('patient.dashboard', ['filter' => 'all']) }}" class="card-medical !p-8 flex items-center justify-between group relative transition-all duration-300 {{ $filter === 'all' ? 'border-2 border-[hsl(var(--hospital-primary))]' : 'hover:border-[hsl(var(--hospital-primary))]' }}">
            @if($filter === 'all')
            <div class="absolute top-4 right-4 animate-pulse">
                <span class="w-2.5 h-2.5 bg-blue-500 rounded-full block shadow-lg shadow-blue-500/50"></span>
            </div>
            @endif
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-[hsl(var(--hospital-primary))] group-hover:bg-[hsl(var(--hospital-primary))] group-hover:text-white transition-all duration-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="flex flex-col text-right">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Total Visits</p>
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight leading-none">{{ $stats['total_appointments'] }}</h3>
                </div>
            </div>
        </a>

        <!-- Stats Card: Upcoming -->
        <a href="{{ route('patient.dashboard', ['filter' => 'upcoming']) }}" class="card-medical !p-8 flex items-center justify-between group relative transition-all duration-300 {{ $filter === 'upcoming' ? 'border-2 border-[hsl(var(--hospital-primary))]' : 'hover:border-[hsl(var(--hospital-primary))]' }}">
            @if($filter === 'upcoming')
            <div class="absolute top-4 right-4 animate-pulse">
                <span class="w-2.5 h-2.5 bg-blue-500 rounded-full block shadow-lg shadow-blue-500/50"></span>
            </div>
            @endif
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-[hsl(var(--hospital-primary))] group-hover:bg-[hsl(var(--hospital-primary))] group-hover:text-white transition-all duration-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="flex flex-col text-right">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Upcoming</p>
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight leading-none">{{ $stats['upcoming_appointments'] }}</h3>
                </div>
            </div>
        </a>

        <!-- Stats Card: Completed -->
        <a href="{{ route('patient.dashboard', ['filter' => 'completed']) }}" class="card-medical !p-8 flex items-center justify-between group relative transition-all duration-300 {{ $filter === 'completed' ? 'border-2 border-[hsl(var(--hospital-primary))]' : 'hover:border-emerald-500' }}">
            @if($filter === 'completed')
            <div class="absolute top-4 right-4 animate-pulse">
                <span class="w-2.5 h-2.5 bg-blue-500 rounded-full block shadow-lg shadow-blue-500/50"></span>
            </div>
            @endif
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="flex flex-col text-right">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Completed</p>
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight leading-none">{{ $stats['completed_appointments'] }}</h3>
                </div>
            </div>
        </a>
    </div>

    <div class="grid lg:grid-cols-3 gap-10">
        <!-- Appointment History -->
        <div class="lg:col-span-2 card-medical !p-0 overflow-hidden">
            <div class="p-8 border-b border-slate-50 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-slate-900">Clinical History</h3>
                    <p class="text-sm font-medium text-slate-400">Your recent medical visits and records</p>
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ route('patient.appointments') }}"
                        class="text-xs font-black text-[hsl(var(--hospital-primary))] uppercase tracking-widest hover:underline">View
                        All</a>
                    <a href="{{ route('patient.doctors') }}" class="btn-primary-hospital uppercase text-[11px] font-black tracking-widest flex items-center gap-2 px-6 py-3 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        BOOK APPOINTMENT
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-white">
                            <th class="px-4 py-4">
                                <button class="w-full flex items-center justify-between px-4 py-2 rounded-xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white transition-all duration-300 group">
                                    <span class="text-[10px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Specialist</span>
                                    <svg class="w-3 h-3 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </button>
                            </th>
                            <th class="px-4 py-4">
                                <button class="w-full flex items-center justify-between px-4 py-2 rounded-xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white transition-all duration-300 group">
                                    <span class="text-[10px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Schedule</span>
                                    <svg class="w-3 h-3 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </button>
                            </th>
                            <th class="px-4 py-4">
                                <button class="w-full flex items-center justify-between px-4 py-2 rounded-xl bg-slate-50/50 border border-transparent hover:border-slate-100 hover:bg-white transition-all duration-300 group">
                                    <span class="text-[10px] font-black text-slate-400 group-hover:text-slate-900 uppercase tracking-[0.2em]">Status</span>
                                    <svg class="w-3 h-3 text-slate-300 group-hover:text-[hsl(var(--hospital-primary))] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </button>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($appointments as $appointment)
                            <tr class="hover:bg-slate-50/30 transition-colors group text-sm">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-[hsl(var(--hospital-primary))] font-bold text-xs">
                                            Dr
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900 capitalize">Dr.
                                                {{ $appointment->doctor->user->name ?? 'Unknown Doctor' }}</p>
                                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                                                {{ $appointment->doctor->specialization }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-slate-600 font-medium">
                                    <p class="text-slate-900 font-bold tracking-tight">
                                        {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</p>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                                        {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</p>
                                </td>
                                <td class="px-8 py-5 text-slate-600">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                                        {{ $appointment->status === 'requested' ? 'bg-orange-50 text-orange-600' : '' }}
                                        {{ $appointment->status === 'confirmed' ? 'bg-blue-50 text-blue-600' : '' }}
                                        {{ $appointment->status === 'completed' ? 'bg-emerald-50 text-emerald-600' : '' }}
                                        {{ $appointment->status === 'cancelled' ? 'bg-rose-50 text-rose-600' : '' }}
                                    ">{{ $appointment->status }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-8 py-20 text-center">
                                    <p class="text-slate-400 font-bold text-sm tracking-widest uppercase">No clinical
                                        records found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions & Promo -->
        <div class="space-y-10">
            <div
                class="bg-[hsl(var(--hospital-primary))] rounded-[2.5rem] p-8 text-white relative overflow-hidden group shadow-2xl shadow-blue-500/20">
                <div
                    class="absolute -right-6 -bottom-6 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-all duration-700">
                </div>
                <div
                    class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-6 relative z-10">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 relative z-10 leading-tight">Book A Specialist</h3>
                <p class="text-blue-100/80 text-sm mb-8 relative z-10 leading-relaxed font-medium">Consult with our
                    world-class medical experts today.</p>
                <a href="{{ route('patient.doctors') }}"
                    class="block w-full text-center bg-white text-[hsl(var(--hospital-primary))] py-4 rounded-2xl font-bold text-sm hover:bg-blue-50 transition-all relative z-10 shadow-xl">Get
                    Started</a>
            </div>

            <div class="bg-white rounded-[2.5rem] p-10 border border-slate-50 shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)]">
                <h3 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight mb-10">Quick Services</h3>
                <div class="grid grid-cols-2 gap-6">
                    @foreach([
                            ['label' => 'History', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'color' => 'slate', 'route' => 'patient.appointments'],
                            ['label' => 'Support', 'icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z', 'color' => 'slate', 'route' => 'patient.support'],
                            ['label' => 'Billing', 'icon' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z', 'color' => 'slate', 'route' => 'patient.billing'],
                            ['label' => 'Settings', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z', 'color' => 'slate', 'route' => 'profile.edit'],
                            ] as $action)
                        <a href="{{ route($action['route']) }}" class="group aspect-square p-6 bg-[#F8FAFC]/50 rounded-[2rem] border border-slate-50 flex flex-col items-center justify-center text-center hover:bg-white hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-300">
                            <div class="w-14 h-14 bg-white rounded-2xl shadow-[0_10px_25px_-10px_rgba(0,0,0,0.05)] border border-slate-50 flex items-center justify-center text-slate-300 group-hover:text-[hsl(var(--hospital-primary))] group-hover:scale-110 transition-all duration-500 mb-4">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="{{ $action['icon'] }}"></path>
                                </svg>
                            </div>
                            <span class="text-[10px] font-black text-slate-500 group-hover:text-slate-900 uppercase tracking-[0.2em]">{{ $action['label'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>