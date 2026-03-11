<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;

class PatientDashboardController extends Controller
{
    public function index()
    {
        $patient = Auth::user()->patient;

        if (!$patient) {
            return redirect('/')->with('error', 'Patient profile not found.');
        }

        $filter = request('filter', 'all');

        $appointmentsQuery = Appointment::where('patient_id', $patient->id)
            ->with('doctor.user')
            ->orderBy('appointment_date', 'desc');

        if ($filter === 'upcoming') {
            $appointmentsQuery->whereIn('status', ['requested', 'confirmed', 'cancelled']);
        } elseif ($filter === 'completed') {
            $appointmentsQuery->where('status', 'completed');
        }

        $appointments = $appointmentsQuery->get();

        $stats = [
            'total_appointments' => Appointment::where('patient_id', $patient->id)->count(),
            'upcoming_appointments' => Appointment::where('patient_id', $patient->id)
                ->where('appointment_date', '>=', date('Y-m-d'))
                ->where('status', '!=', 'cancelled')
                ->count(),
            'completed_appointments' => Appointment::where('patient_id', $patient->id)
                ->where('status', 'completed')
                ->count(),
        ];

        return view('patient.dashboard', compact('appointments', 'stats', 'filter'));
    }
}
