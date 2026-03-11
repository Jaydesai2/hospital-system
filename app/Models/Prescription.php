<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'medical_record_id',
        'appointment_id',
        'medicine_name',
        'dosage',
        'frequency',
        'duration',
        'cost'
    ];

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}