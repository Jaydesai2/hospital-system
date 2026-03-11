<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\Prescription;

class PrescriptionController extends Controller
{

    public function create($appointment_id)
    {
        $appointment = Appointment::findOrFail($appointment_id);

        return view('doctor.prescriptions.create', compact('appointment'));
    }

    public function store(Request $request, $appointment_id)
    {
        $appointment = Appointment::findOrFail($appointment_id);

        $medicalRecord = MedicalRecord::create([
            'appointment_id' => $appointment->id,
            'diagnosis' => $request->diagnosis,
            'notes' => $request->notes
        ]);

        foreach($request->medicine_name as $key => $medicine)
        {
            Prescription::create([
                'medical_record_id' => $medicalRecord->id,
                'medicine_name' => $medicine,
                'dosage' => $request->dosage[$key],
                'frequency' => $request->frequency[$key],
                'duration' => $request->duration[$key],
            ]);
        }

        return redirect()->route('doctor.appointments.show', $appointment->id)
        ->with('success','Prescription added successfully');
    }
}