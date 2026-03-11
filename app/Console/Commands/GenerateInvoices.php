<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Appointment;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Carbon\Carbon;

class GenerateInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:invoices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate invoices for all completed appointments that do not have an invoice yet.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $appointments = Appointment::with(['doctor', 'prescriptions'])
            ->where('status', 'completed')
            ->doesntHave('invoice')
            ->get();

        if ($appointments->isEmpty()) {
            $this->info('No completed appointments without invoices found.');
            return 0;
        }

        foreach ($appointments as $appointment) {
            $consultationFee = $appointment->doctor->consultation_fee ?? 0;
            $prescriptionFee = $appointment->prescriptions->sum('cost');
            $totalAmount = $consultationFee + $prescriptionFee;

            $invoice = Invoice::create([
                'invoice_number' => 'INV-' . strtoupper(substr(uniqid(), -8)),
                'appointment_id' => $appointment->id,
                'patient_id' => $appointment->patient_id,
                'doctor_id' => $appointment->doctor_id,
                'consultation_fee' => $consultationFee,
                'prescription_fee' => $prescriptionFee,
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'due_date' => now()->addDays(7),
            ]);

            // Consultation item
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'description' => 'Consultation Fee - ' . $appointment->doctor->specialization,
                'quantity' => 1,
                'unit_price' => $consultationFee,
                'total_price' => $consultationFee,
            ]);

            // Prescription items
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

            $this->info("Generated invoice {$invoice->invoice_number} for appointment {$appointment->id}");
        }

        return 0;
    }
}
?>
