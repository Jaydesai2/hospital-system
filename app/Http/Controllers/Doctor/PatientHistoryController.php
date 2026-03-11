<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\Prescription;

class PatientHistoryController extends Controller
{

    public function show($patient_id)
    {

        $appointments = Appointment::where('patient_id', $patient_id)
            ->where('status', 'completed')
            ->with(['medicalRecord.prescriptions','doctor.user'])
            ->orderBy('appointment_date','desc')
            ->get();

        return view('doctor.patients.history', compact('appointments'));
    }

}