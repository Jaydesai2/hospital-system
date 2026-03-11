<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasActiveAccount;

class Doctor extends Model
{
    use HasActiveAccount;
    protected $fillable = [
        'user_id',
        'department_id',
        'specialization',
        'phone',
        'experience',
        'consultation_fee'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
}