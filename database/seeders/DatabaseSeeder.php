<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Department;
use App\Models\Appointment;
use App\Models\Schedule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. Create Departments
        $dept1 = Department::create(['name' => 'Cardiology']);
        $dept2 = Department::create(['name' => 'Surgery']);

        // 3. Create Doctors
        $docUser1 = User::create([
            'name' => 'Dr. Smith',
            'email' => 'doctor1@example.com',
            'password' => Hash::make('password'),
            'role' => 'doctor',
        ]);
        $doc1 = Doctor::create([
            'user_id' => $docUser1->id,
            'department_id' => $dept1->id,
            'specialization' => 'Cardiologist',
            'phone' => '1234567890',
            'experience' => 10,
            'consultation_fee' => 500,
        ]);

        $docUser2 = User::create([
            'name' => 'Dr. Jones',
            'email' => 'doctor2@example.com',
            'password' => Hash::make('password'),
            'role' => 'doctor',
        ]);
        $doc2 = Doctor::create([
            'user_id' => $docUser2->id,
            'department_id' => $dept2->id,
            'specialization' => 'General Surgeon',
            'phone' => '0987654321',
            'experience' => 8,
            'consultation_fee' => 700,
        ]);

        // 3.5. Create Schedules
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        foreach ($days as $day) {
            Schedule::create([
                'doctor_id' => $doc1->id,
                'day' => $day,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ]);
            Schedule::create([
                'doctor_id' => $doc2->id,
                'day' => $day,
                'start_time' => '10:00:00',
                'end_time' => '18:00:00',
            ]);
        }

        // 4. Create Patients
        $patientUser = User::create([
            'name' => 'John Doe',
            'email' => 'patient@example.com',
            'password' => Hash::make('password'),
            'role' => 'patient',
        ]);
        $patient = Patient::create([
            'user_id' => $patientUser->id,
            'dob' => '1990-01-01',
            'gender' => 'male',
            'phone' => '5551234567',
            'blood_group' => 'O+',
            'address' => '123 Main St',
        ]);

        // 5. Create Schedules
        Schedule::create([
            'doctor_id' => $doc1->id,
            'day' => 'Monday',
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
        ]);

        Schedule::create([
            'doctor_id' => $doc2->id,
            'day' => 'Tuesday',
            'start_time' => '10:00:00',
            'end_time' => '18:00:00',
        ]);

        // 6. Create Appointments
        Appointment::create([
            'patient_id' => $patient->id,
            'doctor_id' => $doc1->id,
            'appointment_date' => Carbon::now()->addDays(1)->format('Y-m-d'),
            'appointment_time' => '10:00:00',
            'reason' => 'Heart Checkup',
            'status' => 'confirmed',
        ]);

        Appointment::create([
            'patient_id' => $patient->id,
            'doctor_id' => $doc2->id,
            'appointment_date' => Carbon::now()->addDays(2)->format('Y-m-d'),
            'appointment_time' => '14:30:00',
            'reason' => 'Routine Consultation',
            'status' => 'requested',
        ]);
    }
}
