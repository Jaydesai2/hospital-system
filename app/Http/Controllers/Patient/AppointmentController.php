<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    public function doctors()
    {
        $doctors = Doctor::with('user', 'department')->get();
        return view('patient.doctors.index', compact('doctors'));
    }


    public function book($doctor_id)
    {
        $doctor = Doctor::with('user', 'department')->findOrFail($doctor_id);

        $schedules = Schedule::where('doctor_id', $doctor_id)->get();

        return view('patient.appointments.create', compact('doctor', 'schedules'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'reason' => 'required|string|max:500'
        ]);


        $patient = Patient::where('user_id', Auth::id())->firstOrFail();


        $day = date('l', strtotime($request->appointment_date));


        $schedule = Schedule::where('doctor_id', $request->doctor_id)
            ->where('day', $day)
            ->first();


        if (!$schedule) {
            return back()->with('error', 'Doctor not available on selected day');
        }


        $time = strtotime($request->appointment_time);
        $start = strtotime($schedule->start_time);
        $end = strtotime($schedule->end_time);


        if ($time < $start || $time > $end) {
            return back()->with('error', 'Selected time is outside doctor schedule');
        }


        $exists = Appointment::where('doctor_id', $request->doctor_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('appointment_time', $request->appointment_time)
            ->exists();


        if ($exists) {
            return back()->with('error', 'This appointment slot is already booked');
        }


        Appointment::create([
            'patient_id' => $patient->id,
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'reason' => $request->reason,
            'status' => 'requested'
        ]);


        return redirect()->route('patient.appointments')->with('success', 'Appointment booked successfully');

    }



    public function myAppointments()
    {

        $patient = Patient::where('user_id', Auth::id())->firstOrFail();

        $appointments = Appointment::where('patient_id', $patient->id)
            ->with('doctor.user')
            ->orderBy('appointment_date')
            ->get();

        return view('patient.appointments.index', compact('appointments'));

    }

    public function availableSlots($doctor_id, $date)
    {

        $isOnLeave = \App\Models\Leave::where('doctor_id', $doctor_id)->where('date', $date)->exists();
        if ($isOnLeave) {
            return response()->json([
                "slots" => [],
                "booked" => [],
                "message" => "Doctor is on leave"
            ]);
        }

        $day = date('l', strtotime($date));

        $schedule = Schedule::where('doctor_id', $doctor_id)
            ->where('day', $day)
            ->first();

        if (!$schedule) {
            return response()->json([]);
        }

        $start = strtotime($schedule->start_time);
        $end = strtotime($schedule->end_time);

        $slots = [];

        while ($start < $end) {

            $slots[] = date("H:i", $start);

            $start = strtotime("+30 minutes", $start);

        }

        $booked = Appointment::where('doctor_id', $doctor_id)
            ->where('appointment_date', $date)
            ->pluck('appointment_time')
            ->toArray();

        return response()->json([
            "slots" => $slots,
            "booked" => $booked
        ]);

    }
}