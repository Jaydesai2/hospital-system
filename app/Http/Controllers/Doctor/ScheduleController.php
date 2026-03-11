<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{

    public function index()
    {
        $doctor = Doctor::where('user_id',Auth::id())->first();

        if(!$doctor){
            return "Doctor profile not found. Contact admin.";
        }

        $schedules = Schedule::where('doctor_id',$doctor->id)->get();

        return view('doctor.schedules.index',compact('schedules'));
    }


    public function create()
    {
        return view('doctor.schedules.create');
    }


   public function store(Request $request)
{
    $request->validate([
        'day'=>'required',
        'start_time'=>'required',
        'end_time'=>'required'
    ]);

    $doctor = auth()->user()->doctor;

    Schedule::create([
        'doctor_id'=>$doctor->id,
        'day'=>$request->day,
        'start_time'=>$request->start_time,
        'end_time'=>$request->end_time
    ]);

    return redirect('/doctor/schedules');
}


    public function destroy($id)
    {
        Schedule::destroy($id);

        return redirect('/doctor/schedules');
    }

}