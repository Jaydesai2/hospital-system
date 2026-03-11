<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::whereHas('user')->with('user', 'department')->get();
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.doctors.create', compact('departments'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'department_id' => 'required',
            'specialization' => 'required|string|max:255',
            'phone' => 'required',
            'experience' => 'required|integer',
            'consultation_fee' => 'required|numeric'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'doctor'
        ]);

        Doctor::create([
            'user_id' => $user->id,
            'department_id' => $request->department_id,
            'specialization' => $request->specialization,
            'phone' => $request->phone,
            'experience' => $request->experience,
            'consultation_fee' => $request->consultation_fee
        ]);

        return redirect('/admin/doctors')->with('success', 'Doctor added successfully');

    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $departments = Department::all();

        return view('admin.doctors.edit', compact('doctor', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $doctor->update([
            'department_id' => $request->department_id,
            'specialization' => $request->specialization,
            'phone' => $request->phone,
            'experience' => $request->experience,
            'consultation_fee' => $request->consultation_fee
        ]);

        return redirect('/admin/doctors')->with('success', 'Doctor updated successfully');
    }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);

        User::destroy($doctor->user_id);
        Doctor::destroy($id);

        return redirect('/admin/doctors')->with('success', 'Doctor removed successfully');
    }

}