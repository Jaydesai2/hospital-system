<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    public function index()
    {

        $doctor = Doctor::where('user_id',Auth::id())->first();

        $appointments = Appointment::where('doctor_id',$doctor->id)
            ->with('patient.user')
            ->get();

        return view('doctor.appointments.index',compact('appointments'));

    }
public function confirm($id)
{
    $appointment = Appointment::findOrFail($id);

    $appointment->status = 'confirmed';
    $appointment->save();

    return back()->with('success','Appointment confirmed');
}

public function startConsultation($id)
{
    $appointment = Appointment::findOrFail($id);

    $appointment->status = 'in_consultation';
    $appointment->save();

    return back()->with('success','Consultation started');
}

public function complete($id)
{
    $appointment = Appointment::with('doctor', 'patient')->findOrFail($id);

    $appointment->status = 'completed';
    $appointment->save();

    // Generate Invoice
    $invoice = Invoice::create([
        'invoice_number' => 'INV-' . strtoupper(substr(uniqid(), -8)),
        'appointment_id' => $appointment->id,
        'patient_id' => $appointment->patient_id,
        'doctor_id' => $appointment->doctor_id,
        'total_amount' => $appointment->doctor->consultation_fee,
        'status' => 'pending',
        'due_date' => now()->addDays(7),
    ]);

    // Add consultation item
    InvoiceItem::create([
        'invoice_id' => $invoice->id,
        'description' => 'Consultation Fee - ' . $appointment->doctor->specialization,
        'quantity' => 1,
        'unit_price' => $appointment->doctor->consultation_fee,
        'total_price' => $appointment->doctor->consultation_fee,
    ]);

    return back()->with('success','Consultation completed and invoice generated');
}

public function cancel($id)
{
    $appointment = Appointment::findOrFail($id);

    $appointment->status = 'cancelled';
    $appointment->save();

    return back()->with('success','Appointment cancelled');
}
public function todaySchedule()
{
    $doctor = auth()->user()->doctor;

    $today = now()->toDateString();

    $appointments = Appointment::where('doctor_id',$doctor->id)
        ->whereDate('appointment_date',$today)
        ->with('patient.user')
        ->orderBy('appointment_time')
        ->get();

    return view('doctor.schedules.today',compact('appointments'));
}
public function show($id)
{
    $appointment = Appointment::with('patient.user','doctor.user')
        ->findOrFail($id);

    return view('doctor.appointments.show',compact('appointment'));
}
}