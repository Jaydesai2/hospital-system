<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\Prescription;

class PatientPrescriptionController extends Controller
{

    public function show($appointment_id)
    {

        $appointment = Appointment::findOrFail($appointment_id);

        $medicalRecord = MedicalRecord::where('appointment_id', $appointment->id)->first();

        if(!$medicalRecord){
            return redirect()->back()->with('error','Prescription not available yet.');
        }

        $prescriptions = Prescription::where('medical_record_id', $medicalRecord->id)->get();

        return view('patient.prescriptions.show', compact('appointment','medicalRecord','prescriptions'));
    }

}