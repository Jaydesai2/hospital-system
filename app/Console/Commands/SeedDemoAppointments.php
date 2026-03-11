<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class SeedDemoAppointments extends Command
{
    protected $signature = 'demo:appointments';
    protected $description = 'Seed demo appointments for the first patient';

    public function handle()
    {
        $patient = User::where('role', 'patient')->first()->patient;
        $doctors = Doctor::inRandomOrder()->take(3)->get();
        if ($patient && $doctors->count() > 0) {
            Appointment::create([
                'patient_id' => $patient->id,
                'doctor_id' => $doctors->random()->id,
                'appointment_date' => now()->addDays(2)->format('Y-m-d'),
                'appointment_time' => '10:00:00',
                'status' => 'confirmed',
                'reason' => 'Routine checkup'
            ]);
            Appointment::create([
                'patient_id' => $patient->id,
                'doctor_id' => $doctors->random()->id,
                'appointment_date' => now()->subDays(5)->format('Y-m-d'),
                'appointment_time' => '14:30:00',
                'status' => 'completed',
                'reason' => 'Annual physical'
            ]);
            Appointment::create([
                'patient_id' => $patient->id,
                'doctor_id' => $doctors->random()->id,
                'appointment_date' => now()->addDays(7)->format('Y-m-d'),
                'appointment_time' => '09:00:00',
                'status' => 'requested',
                'reason' => 'Follow up consultation'
            ]);
            Appointment::create([
                'patient_id' => $patient->id,
                'doctor_id' => $doctors->random()->id,
                'appointment_date' => now()->subDays(15)->format('Y-m-d'),
                'appointment_time' => '11:15:00',
                'status' => 'completed',
                'reason' => 'Blood test review'
            ]);
            $this->info('Created 4 demo appointments for patient: ' . $patient->user->name);
        } else {
            $this->error('Patient or Doctors not found in the database. Please run seeders first.');
        }
    }
}
