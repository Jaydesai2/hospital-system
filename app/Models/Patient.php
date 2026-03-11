<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasActiveAccount;

class Patient extends Model
{
    use HasActiveAccount;
    protected $fillable = [
        'user_id',
        'dob',
        'gender',
        'phone',
        'blood_group',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}