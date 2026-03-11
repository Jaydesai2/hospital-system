<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))]">
                Today's <span class="text-[hsl(var(--hospital-primary))]">Schedule</span>
            </h2>
            <a href="{{ route('doctor.appointments') }}" class="px-6 py-3 bg-blue-500 text-white rounded-xl font-bold">
                Back to Appointments
            </a>
        </div>
    </x-slot>

    <div class="max-w-6xl mx-auto py-6">
        <div class="bg-white rounded-3xl shadow border border-slate-50 overflow-hidden">
            <table class="w-full">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 text-left">Time</th>
                        <th class="px-6 py-4 text-left">Patient</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                        <tr class="border-t">
                            <td class="px-6 py-4 font-bold">
                                {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $appointment->patient->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold
                                        @if($appointment->status == 'requested') bg-orange-100 text-orange-600 @endif
                                        @if($appointment->status == 'confirmed') bg-green-100 text-green-600 @endif
                                        @if($appointment->status == 'in_consultation') bg-purple-100 text-purple-600 @endif
                                        @if($appointment->status == 'completed') bg-blue-100 text-blue-600 @endif
                                        @if($appointment->status == 'cancelled') bg-red-100 text-red-600 @endif
                                    ">
                                    {{ strtolower($appointment->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                @if($appointment->status == 'requested')
                                    <form method="POST" action="{{ route('doctor.appointments.confirm', $appointment->id) }}"
                                        class="inline">
                                        @csrf
                                        <button class="px-3 py-1 bg-blue-500 text-white rounded">Confirm</button>
                                    </form>
                                @endif
                                @if($appointment->status == 'confirmed')
                                    <form method="POST" action="{{ route('doctor.appointments.start', $appointment->id) }}"
                                        class="inline">
                                        @csrf
                                        <button class="px-3 py-1 bg-purple-500 text-white rounded">Start</button>
                                    </form>
                                @endif
                                @if($appointment->status == 'in_consultation')
                                    <form method="POST" action="{{ route('doctor.appointments.complete', $appointment->id) }}"
                                        class="inline">
                                        @csrf
                                        <button class="px-3 py-1 bg-green-500 text-white rounded">Complete</button>
                                    </form>
                                @endif
                                @if($appointment->status != 'completed' && $appointment->status != 'cancelled')
                                    <form method="POST" action="{{ route('doctor.appointments.cancel', $appointment->id) }}"
                                        class="inline">
                                        @csrf
                                        <button class="px-3 py-1 bg-red-500 text-white rounded">Cancel</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-10 text-slate-400">
                                No appointments today
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>