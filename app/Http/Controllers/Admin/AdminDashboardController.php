<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $filter = request('filter', 'all');
        $period = request('period', 'today');
        $today = now()->toDateString();
        $dateEnd = now()->toDateString();
        $dateStart = $today; // default: today only

        if ($period === 'weekly') {
            $dateStart = now()->subDays(6)->toDateString();
        } elseif ($period === 'monthly') {
            $dateStart = now()->startOfMonth()->toDateString();
        }

        $stats = [
            'doctors_count' => Doctor::count(),
            'patients_count' => Patient::count(),
            'appointments_count' => Appointment::whereBetween('appointment_date', [$dateStart, $dateEnd])->count(),
            'pending_appointments' => Appointment::whereBetween('appointment_date', [$dateStart, $dateEnd])->where('status', 'requested')->count(),
        ];

        $chartDates = [];
        $chartData = [];

        if ($period === 'today') {
            $chartDates[] = \Carbon\Carbon::now()->format('M d');
            $chartData[] = Appointment::whereDate('appointment_date', now()->toDateString())->where('status', 'completed')->count();
        } elseif ($period === 'weekly') {
            for ($i = 6; $i >= 0; $i--) {
                $date = \Carbon\Carbon::now()->subDays($i)->format('Y-m-d');
                $chartDates[] = \Carbon\Carbon::now()->subDays($i)->format('M d');
                $chartData[] = Appointment::whereDate('appointment_date', $date)->where('status', 'completed')->count();
            }
        } elseif ($period === 'monthly') {
            $startOfMonth = \Carbon\Carbon::now()->startOfMonth();
            $today = \Carbon\Carbon::now();
            $totalDays = $startOfMonth->diffInDays($today) + 1;
            for ($i = 0; $i < $totalDays; $i++) {
                $date = $startOfMonth->copy()->addDays($i)->format('Y-m-d');
                $chartDates[] = $startOfMonth->copy()->addDays($i)->format('M d');
                $chartData[] = Appointment::whereDate('appointment_date', $date)->where('status', 'completed')->count();
            }
        }

        $data = [];
        if ($filter === 'specialists') {
            $data = Doctor::with('user')->get();
        } elseif ($filter === 'registered') {
            $data = Patient::with('user')->latest()->take(10)->get();
        } elseif ($filter === 'visits') {
            $data = Appointment::whereBetween('appointment_date', [$dateStart, $dateEnd])->with(['doctor.user', 'patient.user'])->orderBy('appointment_date', 'desc')->get();
        } elseif ($filter === 'pending') {
            $data = Appointment::whereBetween('appointment_date', [$dateStart, $dateEnd])->where('status', 'requested')->with(['doctor.user', 'patient.user'])->orderBy('appointment_date', 'desc')->get();
        }

        return view('admin.dashboard', compact('stats', 'filter', 'period', 'data', 'chartDates', 'chartData'));
    }

    public function show($id)
    {
        $appointment = Appointment::with(['doctor.user', 'patient.user', 'doctor.department'])->findOrFail($id);
        return view('doctor.appointments.show', compact('appointment'));
    }
}
