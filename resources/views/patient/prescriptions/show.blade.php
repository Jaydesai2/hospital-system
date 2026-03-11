<x-app-layout>

<div class="max-w-5xl mx-auto py-10">

<h2 class="text-2xl font-bold mb-6">
Prescription Details
</h2>

<div class="bg-white shadow rounded p-6 mb-6">

<h3 class="text-lg font-semibold mb-2">Diagnosis</h3>

<p class="text-gray-700 mb-4">
{{ $medicalRecord->diagnosis }}
</p>

<h3 class="text-lg font-semibold mb-2">Doctor Notes</h3>

<p class="text-gray-700">
{{ $medicalRecord->notes }}
</p>

</div>

<div class="bg-white shadow rounded p-6">

<h3 class="text-xl font-semibold mb-4">Medicines</h3>

<table class="w-full border">

<thead>

<tr class="bg-gray-100">

<th class="border p-2">Medicine</th>
<th class="border p-2">Dosage</th>
<th class="border p-2">Frequency</th>
<th class="border p-2">Duration</th>

</tr>

</thead>

<tbody>

@foreach($prescriptions as $medicine)

<tr>

<td class="border p-2">{{ $medicine->medicine_name }}</td>
<td class="border p-2">{{ $medicine->dosage }}</td>
<td class="border p-2">{{ $medicine->frequency }}</td>
<td class="border p-2">{{ $medicine->duration }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</x-app-layout>