<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function index()
    {
        $patient = Auth::user()->patient;

        if (!$patient) {
            return back()->with('error', 'Patient record not found.');
        }

        $invoices = Invoice::where('patient_id', $patient->id)
            ->with('doctor.user')
            ->latest()
            ->get();

        $stats = [
            'outstanding_balance' => Invoice::where('patient_id', $patient->id)->where('status', 'pending')->sum('total_amount'),
            'last_payment' => Invoice::where('patient_id', $patient->id)->where('status', 'paid')->latest('updated_at')->first()?->total_amount ?? 0,
            'total_paid' => Invoice::where('patient_id', $patient->id)->where('status', 'paid')->sum('total_amount'),
        ];

        return view('patient.billing.index', compact('stats', 'invoices'));
    }

    public function show($id)
    {
        $invoice = Invoice::with(['items', 'doctor.user', 'appointment'])
            ->where('patient_id', Auth::user()->patient?->id)
            ->findOrFail($id);

        return view('patient.billing.show', compact('invoice'));
    }
}
