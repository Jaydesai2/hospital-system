<x-dashboard-layout>

    <x-slot name="header">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">

            <div>
                <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight">
                    Clinical <span class="text-[hsl(var(--hospital-primary))]">Appointments</span>
                </h2>

                <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-[0.2em]">
                    Patient Consultation Management
                </p>
            </div>


            <div class="flex items-center gap-3">

                <a href="{{ route('doctor.today.schedule') }}"
                    class="px-6 py-3 bg-indigo-500 hover:bg-indigo-600 text-white rounded-xl font-bold">
                    Today's Schedule
                </a>

                <div class="bg-blue-50 px-6 py-3 rounded-2xl border border-blue-100 flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></div>

                    <span class="text-[11px] font-black text-blue-600 uppercase tracking-widest">
                        Live Schedule Auto-Sync
                    </span>
                </div>

            </div>

        </div>

    </x-slot>



    <div
        class="bg-white rounded-[3rem] shadow-[0_30px_60px_-20px_rgba(0,0,0,0.04)] border border-slate-50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-white">
                        <th class="px-6 py-4">
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Patient
                                Record</span>
                        </th>
                        <th class="px-6 py-4">
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Date &
                                Time</span>
                        </th>
                        <th class="px-6 py-4">
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Clinical
                                Status</span>
                        </th>
                        <th class="px-6 py-4 text-right">
                            <span
                                class="text-[10px] font-black text-slate-300 uppercase tracking-[0.2em]">Actions</span>
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-50">
                    @forelse($appointments as $appointment)
                        <tr class="hover:bg-slate-50/50 transition-all duration-300 group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-gradient-to-tr from-slate-50 to-blue-50 border border-white flex items-center justify-center text-slate-700 font-black text-sm shadow-sm">
                                        {{ substr($appointment->patient->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <h4 class="font-black text-slate-900 text-sm tracking-tight">
                                            {{ $appointment->patient->user->name }}
                                        </h4>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                            ID: #{{ str_pad($appointment->patient->id, 5, '0', STR_PAD_LEFT) }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="space-y-0.5">
                                    <span class="text-slate-900 font-black text-xs tracking-tight block">
                                        {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                                    </span>
                                    <div
                                        class="flex items-center gap-1.5 text-slate-400 text-[10px] font-bold uppercase tracking-widest">
                                        <div class="w-1 h-1 rounded-full bg-slate-300"></div>
                                        {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-[0.15em] ring-1 shadow-sm
                                        @if($appointment->status == 'requested') bg-orange-50 text-orange-600 ring-orange-100 @endif
                                        @if($appointment->status == 'confirmed') bg-green-50 text-green-600 ring-green-100 @endif
                                        @if($appointment->status == 'in_consultation') bg-purple-50 text-purple-600 ring-purple-100 @endif
                                        @if($appointment->status == 'completed') bg-blue-50 text-blue-600 ring-blue-100 @endif
                                        @if($appointment->status == 'cancelled') bg-red-50 text-red-600 ring-red-100 @endif
                                    ">
                                    {{ $appointment->status }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('doctor.appointments.show', $appointment->id) }}"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-400 hover:bg-blue-500 hover:text-white transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                    @if($appointment->status == 'requested')
                                        <form method="POST"
                                            action="{{ route('doctor.appointments.confirm', $appointment->id) }}">
                                            @csrf
                                            <button
                                                class="px-2.5 py-1 bg-blue-500 hover:bg-blue-600 text-white text-[10px] rounded-lg font-bold uppercase tracking-wider">Confirm</button>
                                        </form>
                                    @endif

                                    @if($appointment->status == 'confirmed')
                                        <form method="POST" action="{{ route('doctor.appointments.start', $appointment->id) }}">
                                            @csrf
                                            <button
                                                class="px-2.5 py-1 bg-purple-500 hover:bg-purple-600 text-white text-[10px] rounded-lg font-bold uppercase tracking-wider">Start</button>
                                        </form>
                                    @endif

                                    @if($appointment->status == 'in_consultation')
                                        <form method="POST"
                                            action="{{ route('doctor.appointments.complete', $appointment->id) }}">
                                            @csrf
                                            <button
                                                class="px-2.5 py-1 bg-green-500 hover:bg-green-600 text-white text-[10px] rounded-lg font-bold uppercase tracking-wider">Complete</button>
                                        </form>
                                    @endif

                                    @if($appointment->status != 'completed' && $appointment->status != 'cancelled')
                                        <form method="POST"
                                            action="{{ route('doctor.appointments.cancel', $appointment->id) }}">
                                            @csrf
                                            <button
                                                class="px-2.5 py-1 bg-red-500 hover:bg-red-600 text-white text-[10px] rounded-lg font-bold uppercase tracking-wider">Cancel</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-20 text-center text-slate-400 font-bold">
                                No Upcoming Appointments
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-dashboard-layout>