<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with(['patient.user', 'doctor.user'])
            ->latest()
            ->get();

        return view('admin.invoices.index', compact('invoices'));
    }

    public function show($id)
    {
        $invoice = Invoice::with(['items', 'patient.user', 'doctor.user', 'appointment'])
            ->findOrFail($id);

        return view('admin.invoices.show', compact('invoice'));
    }

    public function markAsPaid($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update(['status' => 'paid']);

        return back()->with('success', 'Invoice marked as paid.');
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return back()->with('success', 'Invoice deleted.');
    }
}
