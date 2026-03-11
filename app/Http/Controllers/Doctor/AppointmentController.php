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
        $appointment = Appointment::with(['doctor', 'patient', 'prescriptions'])->findOrFail($id);

        $appointment->status = 'completed';
        $appointment->save();

        // Calculate Fees
        $consultationFee = $appointment->doctor->consultation_fee ?? 0;
        $prescriptionFee = $appointment->prescriptions->sum('cost');
        $totalAmount = $consultationFee + $prescriptionFee;

        // Generate or Update Invoice
        $invoice = Invoice::updateOrCreate(
            ['appointment_id' => $appointment->id],
            [
                'invoice_number' => 'INV-' . strtoupper(substr(uniqid(), -8)),
                'patient_id' => $appointment->patient_id,
                'doctor_id' => $appointment->doctor_id,
                'consultation_fee' => $consultationFee,
                'prescription_fee' => $prescriptionFee,
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'due_date' => now()->addDays(7),
            ]
        );

        // Clear existing items if updating
        $invoice->items()->delete();

        // Add consultation item
        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'description' => 'Consultation Fee - ' . $appointment->doctor->specialization,
            'quantity' => 1,
            'unit_price' => $consultationFee,
            'total_price' => $consultationFee,
        ]);

        // Add prescription items
        foreach ($appointment->prescriptions as $prescription) {
            if ($prescription->cost > 0) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'description' => 'Medicine: ' . $prescription->medicine_name . ' (' . $prescription->dosage . ')',
                    'quantity' => 1,
                    'unit_price' => $prescription->cost,
                    'total_price' => $prescription->cost,
                ]);
            }
        }

        return back()->with('success', 'Consultation completed and dynamic invoice generated');
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