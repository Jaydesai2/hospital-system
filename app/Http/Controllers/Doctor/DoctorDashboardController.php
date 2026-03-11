<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;

class DoctorDashboardController extends Controller
{
    public function index()
    {
        $doctor = Auth::user()->doctor;

        if (!$doctor) {
            return redirect('/')->with('error', 'Doctor profile not found.');
        }

        $filter = request('filter', 'all');

        $appointmentsQuery = Appointment::where('doctor_id', $doctor->id)
            ->with('patient.user')
            ->orderBy('appointment_date', 'asc')
            ->orderBy('appointment_time', 'asc');

        if ($filter === 'today') {
            $appointmentsQuery->whereDate('appointment_date', date('Y-m-d'));
        } elseif ($filter === 'patients') {
            $appointmentsQuery->where('status', 'completed')
                ->whereIn('id', function ($query) use ($doctor) {
                    $query->selectRaw('MAX(id)')
                        ->from('appointments')
                        ->where('doctor_id', $doctor->id)
                        ->where('status', 'completed')
                        ->groupBy('patient_id');
                });
        }

        $appointments = $appointmentsQuery->get();

        $stats = [
            'total_appointments' => Appointment::where('doctor_id', $doctor->id)->count(),
            'upcoming_today' => Appointment::where('doctor_id', $doctor->id)
                ->where('appointment_date', date('Y-m-d'))
                ->count(),
            'total_patients' => Appointment::where('doctor_id', $doctor->id)
                ->distinct('patient_id')
                ->count('patient_id'),
        ];

        return view('doctor.dashboard', compact('appointments', 'stats', 'filter'));
    }
}
