<x-app-layout>

<h2 class="text-2xl font-bold mb-6">Add Prescription</h2>

<form method="POST" action="{{ route('doctor.prescription.store',$appointment->id) }}">

@csrf

<div class="mb-4">
<label>Diagnosis</label>
<textarea name="diagnosis" class="w-full border p-2"></textarea>
</div>

<div class="mb-4">
<label>Notes</label>
<textarea name="notes" class="w-full border p-2"></textarea>
</div>

<div id="medicine-container">

<div class="grid grid-cols-4 gap-4 mb-4">

<input type="text" name="medicine_name[]" placeholder="Medicine Name" class="border p-2">

<input type="text" name="dosage[]" placeholder="Dosage" class="border p-2">

<input type="text" name="frequency[]" placeholder="Frequency" class="border p-2">

<input type="text" name="duration[]" placeholder="Duration" class="border p-2">

</div>

</div>

<button type="button" onclick="addMedicine()" class="bg-blue-500 text-white px-3 py-1">
Add Medicine
</button>

<br><br>

<button type="submit" class="bg-green-600 text-white px-4 py-2">
Save Prescription
</button>

</form>

<script>

function addMedicine(){

let container = document.getElementById('medicine-container');

let html = `
<div class="grid grid-cols-4 gap-4 mb-4">
<input type="text" name="medicine_name[]" placeholder="Medicine Name" class="border p-2">
<input type="text" name="dosage[]" placeholder="Dosage" class="border p-2">
<input type="text" name="frequency[]" placeholder="Frequency" class="border p-2">
<input type="text" name="duration[]" placeholder="Duration" class="border p-2">
</div>
`;

container.insertAdjacentHTML('beforeend', html);

}

</script>

</x-app-layout>