<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        // Mocking billing data as per implementation plan
        $stats = [
            'outstanding_balance' => 450.00,
            'last_payment' => 120.00,
            'total_paid' => 2850.00,
        ];

        $invoices = [
            [
                'id' => 'INV-0042',
                'date' => '2026-03-05',
                'description' => 'Consultation with Cardiology Dept',
                'amount' => 150.00,
                'status' => 'pending',
                'type' => 'Service'
            ],
            [
                'id' => 'INV-0038',
                'date' => '2026-02-28',
                'description' => 'Lab Tests - Blood Panel',
                'amount' => 85.00,
                'status' => 'paid',
                'type' => 'Lab'
            ],
            [
                'id' => 'INV-0035',
                'date' => '2026-02-15',
                'description' => 'Annual Physical Examination',
                'amount' => 200.00,
                'status' => 'paid',
                'type' => 'Checkup'
            ],
            [
                'id' => 'INV-0031',
                'date' => '2026-02-01',
                'description' => 'Pharmacy Refill - Prescription #4241',
                'amount' => 45.50,
                'status' => 'failed',
                'type' => 'Pharmacy'
            ]
        ];

        return view('patient.billing.index', compact('stats', 'invoices'));
    }
}
