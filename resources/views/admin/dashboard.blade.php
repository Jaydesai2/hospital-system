<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight">Admin <span
                class="text-[hsl(var(--hospital-primary))]">Overview</span></h2>
    </x-slot>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Stats Card: Doctors -->
        <a href="{{ route('admin.dashboard', ['filter' => 'specialists', 'period' => $period]) }}"
            class="card-medical !p-8 group relative transition-all duration-300 {{ $filter === 'specialists' ? 'border-2 border-[hsl(var(--hospital-primary))]' : 'hover:border-[hsl(var(--hospital-primary))]' }}">
            @if($filter === 'specialists')
                <div class="absolute top-4 right-4 animate-pulse">
                    <span class="w-2.5 h-2.5 bg-blue-500 rounded-full block shadow-lg shadow-blue-500/50"></span>
                </div>
            @endif
            <div class="flex items-center justify-between mb-6">
                <div
                    class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-[hsl(var(--hospital-primary))] group-hover:bg-[hsl(var(--hospital-primary))] group-hover:text-white transition-all duration-500">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <span
                    class="text-[10px] font-bold text-emerald-500 bg-emerald-50 px-3 py-1 rounded-full uppercase tracking-widest">+12%</span>
            </div>
            <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mb-1">Specialists</p>
            <h3 class="text-3xl font-bold text-slate-900 tracking-tight">{{ $stats['doctors_count'] }}</h3>
        </a>

        <!-- Stats Card: Patients -->
        <a href="{{ route('admin.dashboard', ['filter' => 'registered', 'period' => $period]) }}"
            class="card-medical !p-8 group relative transition-all duration-300 {{ $filter === 'registered' ? 'border-2 border-[hsl(var(--hospital-primary))]' : 'hover:border-teal-500' }}">
            @if($filter === 'registered')
                <div class="absolute top-4 right-4 animate-pulse">
                    <span class="w-2.5 h-2.5 bg-blue-500 rounded-full block shadow-lg shadow-blue-500/50"></span>
                </div>
            @endif
            <div class="flex items-center justify-between mb-6">
                <div
                    class="w-14 h-14 bg-teal-50 rounded-2xl flex items-center justify-center text-teal-600 group-hover:bg-teal-600 group-hover:text-white transition-all duration-500">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <span
                    class="text-[10px] font-bold text-blue-500 bg-blue-50 px-3 py-1 rounded-full uppercase tracking-widest">+5%</span>
            </div>
            <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mb-1">Registered</p>
            <h3 class="text-3xl font-bold text-slate-900 tracking-tight">{{ $stats['patients_count'] }}</h3>
        </a>

        <!-- Stats Card: Appointments -->
        <a href="{{ route('admin.dashboard', ['filter' => 'visits', 'period' => $period]) }}"
            class="card-medical !p-8 group relative transition-all duration-300 {{ $filter === 'visits' ? 'border-2 border-[hsl(var(--hospital-primary))]' : 'hover:border-purple-500' }}">
            @if($filter === 'visits')
                <div class="absolute top-4 right-4 animate-pulse">
                    <span class="w-2.5 h-2.5 bg-blue-500 rounded-full block shadow-lg shadow-blue-500/50"></span>
                </div>
            @endif
            <div class="flex items-center justify-between mb-6">
                <div
                    class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-all duration-500">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <span
                    class="text-[10px] font-bold text-purple-500 bg-purple-50 px-3 py-1 rounded-full uppercase tracking-widest">Active</span>
            </div>
            <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mb-1">
                {{ $period === 'weekly' ? 'Weekly' : ($period === 'monthly' ? 'Monthly' : "Today's") }} Visits
            </p>
            <h3 class="text-3xl font-bold text-slate-900 tracking-tight">{{ $stats['appointments_count'] }}</h3>
        </a>

        <!-- Stats Card: Pending -->
        <a href="{{ route('admin.dashboard', ['filter' => 'pending', 'period' => $period]) }}"
            class="card-medical !p-8 group relative transition-all duration-300 {{ $filter === 'pending' ? 'border-2 border-[hsl(var(--hospital-primary))]' : 'hover:border-orange-500' }}">
            @if($filter === 'pending')
                <div class="absolute top-4 right-4 animate-pulse">
                    <span class="w-2.5 h-2.5 bg-blue-500 rounded-full block shadow-lg shadow-blue-500/50"></span>
                </div>
            @endif
            <div class="flex items-center justify-between mb-6">
                <div
                    class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-600 group-hover:bg-orange-600 group-hover:text-white transition-all duration-500">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <span
                    class="text-[10px] font-bold text-orange-500 bg-orange-50 px-3 py-1 rounded-full uppercase tracking-widest">Action</span>
            </div>
            <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mb-1">
                {{ $period === 'weekly' ? 'Weekly' : ($period === 'monthly' ? 'Monthly' : "Today's") }} Pending
            </p>
            <h3 class="text-3xl font-bold text-slate-900 tracking-tight">{{ $stats['pending_appointments'] }}</h3>
        </a>
    </div>

    <div class="mt-10 grid lg:grid-cols-3 gap-10">
        <div class="lg:col-span-2 space-y-10">
            @if($filter !== 'all')
                <div class="card-medical !p-0 overflow-hidden">
                    <div class="p-8 border-b border-slate-50 flex items-center justify-between">
                        <div>
                            @php
                                $periodLabel = $period === 'weekly' ? 'Weekly' : ($period === 'monthly' ? 'Monthly' : "Today's");
                            @endphp
                            <h3 class="text-xl font-bold text-slate-900 capitalize">
                                @if($filter === 'visits') {{ $periodLabel }} Visits
                                @elseif($filter === 'pending') {{ $periodLabel }} Pending
                                @elseif($filter === 'registered') Registered Users
                                @else {{ $filter }} Details
                                @endif
                            </h3>
                            <p class="text-sm font-medium text-slate-400">
                                @if($filter === 'registered') Last 10 registered users
                                @elseif($filter === 'visits' || $filter === 'pending')
                                    @if($period === 'weekly') Appointments from the last 7 days
                                    @elseif($period === 'monthly') Appointments for {{ now()->format('F Y') }}
                                    @else Appointments for today
                                    @endif
                                @else Detailed information about {{ $filter }} records
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        @if($filter === 'specialists')
                            <table class="w-full text-left">
                                <thead>
                                    <tr class="bg-white">
                                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                            Name</th>
                                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                            Specialization</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50">
                                    @forelse($data as $doctor)
                                        <tr>
                                            <td class="px-8 py-5 font-bold text-slate-900 capitalize">{{ $doctor->user->name }}</td>
                                            <td class="px-8 py-5 text-slate-500">{{ $doctor->specialization }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2"
                                                class="px-8 py-10 text-center text-slate-400 font-bold uppercase tracking-widest text-[10px]">
                                                No Specialists found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @elseif($filter === 'registered')
                            <table class="w-full text-left">
                                <thead>
                                    <tr class="bg-white">
                                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                            Name</th>
                                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                            Email</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50">
                                    @forelse($data as $patient)
                                        <tr>
                                            <td class="px-8 py-5 font-bold text-slate-900 capitalize">{{ $patient->user->name }}
                                            </td>
                                            <td class="px-8 py-5 text-slate-500">{{ $patient->user->email }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2"
                                                class="px-8 py-10 text-center text-slate-400 font-bold uppercase tracking-widest text-[10px]">
                                                No Patient found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @elseif($filter === 'visits' || $filter === 'pending')
                            <table class="w-full text-left">
                                <thead>
                                    <tr class="bg-white">
                                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                            Patient</th>
                                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                            Doctor</th>
                                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                            Date</th>
                                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                            Status</th>
                                        <th
                                            class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50">
                                    @forelse($data as $appointment)
                                        <tr>
                                            <td class="px-8 py-5 font-bold text-slate-900 capitalize">
                                                {{ $appointment->patient->user->name }}
                                            </td>
                                            <td class="px-8 py-5 text-slate-500 capitalize">{{ $appointment->doctor->user->name }}
                                            </td>
                                            <td class="px-8 py-5 text-slate-500">
                                                {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                                                @if($period !== 'today')
                                                    @php $isToday = \Carbon\Carbon::parse($appointment->appointment_date)->isToday(); @endphp
                                                    @if($isToday)
                                                        <span class="ml-2 text-[9px] font-black text-emerald-500 bg-emerald-50 px-2 py-0.5 rounded-full uppercase tracking-wider">Today</span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td class="px-8 py-5">
                                                <span
                                                    class="px-3 py-1 bg-slate-100 text-[10px] font-bold rounded-full uppercase tracking-widest text-slate-600">{{ $appointment->status }}</span>
                                            </td>
                                            <td class="px-8 py-5 text-right">
                                                <a href="{{ route('admin.appointments.show', $appointment->id) }}"
                                                    class="inline-flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-[hsl(var(--hospital-primary))] hover:text-[hsl(var(--hospital-secondary))] transition-colors">
                                                    Details
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                            d="M9 5l7 7-7 7"></path>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5"
                                                class="px-8 py-10 text-center text-slate-400 font-bold uppercase tracking-widest text-[10px]">
                                                No appointments found
                                                @if($period === 'weekly') in the last 7 days
                                                @elseif($period === 'monthly') in {{ now()->format('F Y') }}
                                                @else for today
                                                @endif
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            @endif

            <div class="card-medical !p-10">
                <div class="flex items-center justify-between mb-10">
                    <div>
                        <h3 class="text-xl font-bold text-slate-900">Clinic Growth</h3>
                        <p class="text-sm font-medium text-slate-400">
                            @if($period === 'today') Completed appointments for today
                            @elseif($period === 'weekly') Completed appointments over the last 7 days
                            @else Completed appointments for {{ now()->format('F Y') }}
                            @endif
                        </p>
                    </div>
                    <div class="flex items-center gap-2 bg-slate-100 p-1.5 rounded-xl">
                        <a href="{{ route('admin.dashboard', ['period' => 'today', 'filter' => $filter]) }}"
                            class="px-4 py-2 text-xs font-black uppercase tracking-wider rounded-lg transition-all {{ $period === 'today' ? 'bg-white shadow-sm text-blue-600' : 'text-slate-500 hover:text-slate-800' }}">Today</a>
                        <a href="{{ route('admin.dashboard', ['period' => 'weekly', 'filter' => $filter]) }}"
                            class="px-4 py-2 text-xs font-black uppercase tracking-wider rounded-lg transition-all {{ $period === 'weekly' ? 'bg-white shadow-sm text-blue-600' : 'text-slate-500 hover:text-slate-800' }}">Weekly</a>
                        <a href="{{ route('admin.dashboard', ['period' => 'monthly', 'filter' => $filter]) }}"
                            class="px-4 py-2 text-xs font-black uppercase tracking-wider rounded-lg transition-all {{ $period === 'monthly' ? 'bg-white shadow-sm text-blue-600' : 'text-slate-500 hover:text-slate-800' }}">Monthly</a>
                    </div>
                </div>
                <div class="h-80 w-full relative">
                    <canvas id="analyticsChart"></canvas>
                </div>
            </div>
        </div>

        <div class="space-y-10">
            <div class="card-medical">
                <h3 class="text-lg font-bold text-slate-900 mb-8">Quick Actions</h3>
                <div class="space-y-4">
                    <a href="/admin/doctors/create"
                        class="flex items-center gap-4 p-4 rounded-2xl border border-slate-50 hover:border-blue-100 hover:bg-blue-50/50 transition-all duration-300 group">
                        <div
                            class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-[hsl(var(--hospital-primary))] group-hover:bg-[hsl(var(--hospital-primary))] group-hover:text-white transition-all duration-300 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-slate-900 text-sm">Add Specialist</p>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Board
                                Certified</p>
                        </div>
                    </a>

                    <a href="#"
                        class="flex items-center gap-4 p-4 rounded-2xl border border-slate-50 hover:border-teal-100 hover:bg-teal-50/50 transition-all duration-300 group">
                        <div
                            class="w-12 h-12 bg-teal-50 rounded-xl flex items-center justify-center text-teal-600 group-hover:bg-teal-600 group-hover:text-white transition-all duration-300 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-slate-900 text-sm">Verify Records</p>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Medical
                                History</p>
                        </div>
                    </a>

                    <a href="#"
                        class="flex items-center gap-4 p-4 rounded-2xl border border-slate-50 hover:border-indigo-100 hover:bg-indigo-50/50 transition-all duration-300 group">
                        <div
                            class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-slate-900 text-sm">System Update</p>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Global
                                Status</p>
                        </div>
                    </a>
                </div>
            </div>

            <div
                class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[2.5rem] p-8 text-white relative isolate overflow-hidden group shadow-2xl shadow-blue-500/20">
                <div
                    class="absolute -right-6 -bottom-6 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-all duration-700">
                </div>
                <h4 class="text-lg font-bold mb-3 relative z-10">System Support</h4>
                <p class="text-sm font-medium text-blue-100/80 mb-8 relative z-10 leading-relaxed">Need help with system
                    configuration or staff management?</p>
                <button
                    class="w-full py-4 bg-white/20 backdrop-blur-md rounded-2xl font-bold text-xs uppercase tracking-widest hover:bg-white hover:text-blue-600 transition-all relative z-10">Contact
                    Support</button>
            </div>
        </div>
    </div>

    <!-- Chart.js Injection -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('analyticsChart').getContext('2d');

            // Generate gradient
            let gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(59, 130, 246, 0.5)'); // Blue 500
            gradient.addColorStop(1, 'rgba(59, 130, 246, 0.0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($chartDates) !!},
                    datasets: [{
                        label: 'Completed Appointments',
                        data: {!! json_encode($chartData) !!},
                        borderColor: '#3b82f6', // Bootstrap primary equivalent
                        backgroundColor: gradient,
                        borderWidth: 3,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#3b82f6',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: '#1e293b', // slate-800
                            titleFont: { size: 13, family: "'Outfit', sans-serif" },
                            bodyFont: { size: 14, weight: 'bold', family: "'Outfit', sans-serif" },
                            padding: 12,
                            displayColors: false,
                            cornerRadius: 8,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#f1f5f9', // slate-100
                                drawBorder: false,
                            },
                            ticks: {
                                font: { family: "'Outfit', sans-serif", size: 11 },
                                color: '#94a3b8', // slate-400
                                stepSize: 1
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                font: { family: "'Outfit', sans-serif", size: 11 },
                                color: '#94a3b8', // slate-400
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-dashboard-layout>