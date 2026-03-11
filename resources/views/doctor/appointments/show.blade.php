<x-dashboard-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-black text-[hsl(var(--hospital-header))]">
            Appointment <span class="text-[hsl(var(--hospital-primary))]">Details</span>
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-8">

        <div class="bg-white rounded-3xl p-10 shadow border border-slate-50 space-y-6">

            <div>
                <label class="text-xs text-slate-400 font-bold block mb-1 uppercase tracking-widest">Patient
                    Name</label>
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-[hsl(var(--hospital-primary))] font-bold text-sm">
                        {{ substr($appointment->patient->user->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-lg font-black text-slate-900">{{ $appointment->patient->user->name }}</p>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Patient ID:
                            #{{ str_pad($appointment->patient->id, 5, '0', STR_PAD_LEFT) }}</p>
                    </div>
                </div>
            </div>

            <div>
                <label class="text-xs text-slate-400 font-bold">Appointment Date</label>
                <p>{{ $appointment->appointment_date }}</p>
            </div>

            <div>
                <label class="text-xs text-slate-400 font-bold">Appointment Time</label>
                <p>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</p>
            </div>

            <div>
                <label class="text-xs text-slate-400 font-bold">Reason</label>
                <p>{{ $appointment->reason }}</p>
            </div>

            <div>
                <label class="text-xs text-slate-400 font-bold">Status</label>
                <p>{{ $appointment->status }}</p>
            </div>
           <a href="{{ route('doctor.patient.history', $appointment->patient_id) }}"
class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-bold">
View Patient History
</a>
        </div>

    </div>

</x-dashboard-layout>