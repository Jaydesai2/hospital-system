<x-dashboard-layout>

<x-slot name="header">

<h2 class="text-2xl font-black text-[hsl(var(--hospital-header))] tracking-tight">
Patient <span class="text-[hsl(var(--hospital-primary))]">Medical History</span>
</h2>

</x-slot>

<div class="space-y-10">

@forelse($appointments as $appointment)

<div class="bg-white rounded-3xl shadow p-8 border border-slate-100">

<div class="flex justify-between items-center mb-4">

<div>

<h3 class="text-lg font-black text-slate-900">

Appointment - {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d Y') }}

</h3>

<p class="text-sm text-slate-400">

Doctor: Dr. {{ $appointment->doctor->user->name }}

</p>

</div>

</div>

@if($appointment->medicalRecord)

<div class="mt-6">

<h4 class="font-bold text-slate-700 mb-2">
Diagnosis
</h4>

<p class="text-slate-600 mb-6">
{{ $appointment->medicalRecord->diagnosis }}
</p>

<h4 class="font-bold text-slate-700 mb-3">
Medicines
</h4>

<ul class="space-y-2">

@foreach($appointment->medicalRecord->prescriptions as $medicine)

<li class="flex justify-between bg-slate-50 px-4 py-2 rounded-lg">

<span class="font-semibold">
{{ $medicine->medicine_name }}
</span>

<span class="text-sm text-slate-500">
{{ $medicine->dosage }} | {{ $medicine->frequency }} | {{ $medicine->duration }}
</span>

</li>

@endforeach

</ul>

</div>

@endif

</div>

@empty

<div class="text-center py-20">

<p class="text-slate-400 font-bold uppercase tracking-widest">
No Medical History Available
</p>

</div>

@endforelse

</div>

</x-dashboard-layout>