<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\DoctorController;

use App\Http\Controllers\Doctor\DoctorDashboardController;
use App\Http\Controllers\Patient\PatientDashboardController;
use App\Http\Controllers\Doctor\ScheduleController;
use App\Http\Controllers\Patient\AppointmentController;
use App\Http\Controllers\Doctor\AppointmentController as DoctorAppointmentController;
use App\Http\Controllers\Patient\BillingController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Doctor\PrescriptionController;
use App\Http\Controllers\Patient\PatientPrescriptionController;
use App\Http\Controllers\Doctor\PatientHistoryController;



Route::get('/', function () {
    return view('index');
});

Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contactus.index');
Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contactus.store');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/dashboard', function () {

    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    if ($user->role === 'doctor') {
        return redirect('/doctor/dashboard');
    }

    if ($user->role === 'patient') {
        return redirect('/patient/dashboard');
    }

})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::middleware('admin')->group(function () {

        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/appointments/{id}', [AdminDashboardController::class, 'show'])->name('admin.appointments.show');

        Route::get('/admin/doctors', [DoctorController::class, 'index'])->name('admin.doctors.index');
        Route::get('/admin/doctors/create', [DoctorController::class, 'create'])->name('admin.doctors.create');
        Route::post('/admin/doctors/store', [DoctorController::class, 'store'])->name('admin.doctors.store');
        Route::get('/admin/doctors/{id}/edit', [DoctorController::class, 'edit'])->name('admin.doctors.edit');
        Route::post('/admin/doctors/{id}/update', [DoctorController::class, 'update'])->name('admin.doctors.update');
        Route::post('/admin/doctors/{id}/delete', [DoctorController::class, 'destroy'])->name('admin.doctors.delete');

    });


    Route::middleware('doctor')->group(function () {

        Route::get('/doctor/dashboard', [DoctorDashboardController::class, 'index'])->name('doctor.dashboard');
        Route::get('/doctor/schedules', [ScheduleController::class, 'index'])->name('doctor.schedules.index');
        Route::get('/doctor/schedules/create', [ScheduleController::class, 'create'])->name('doctor.schedules.create');
        Route::post('/doctor/schedules/store', [ScheduleController::class, 'store'])->name('doctor.schedules.store');
        Route::post('/doctor/schedules/{id}/delete', [ScheduleController::class, 'destroy'])->name('doctor.schedules.delete');
        Route::get('/doctor/appointments', [DoctorAppointmentController::class, 'index'])->name('doctor.appointments');
        Route::post('/doctor/appointments/{id}/confirm', [DoctorAppointmentController::class, 'confirm'])->name('doctor.appointments.confirm');

        Route::post('/doctor/appointments/{id}/start', [DoctorAppointmentController::class, 'startConsultation'])->name('doctor.appointments.start');

        Route::post('/doctor/appointments/{id}/complete', [DoctorAppointmentController::class, 'complete'])->name('doctor.appointments.complete');

        Route::post('/doctor/appointments/{id}/cancel', [DoctorAppointmentController::class, 'cancel'])->name('doctor.appointments.cancel');
        Route::get('/doctor/today-schedule', [DoctorAppointmentController::class, 'todaySchedule'])->name('doctor.today.schedule');
        Route::get('/doctor/appointments/{id}', [DoctorAppointmentController::class, 'show'])->name('doctor.appointments.show');
        Route::get('/doctor/prescription/{appointment}', [PrescriptionController::class,'create'])->name('doctor.prescription.create');

        Route::post('/doctor/prescription/{appointment}/store', [PrescriptionController::class,'store'])->name('doctor.prescription.store');
        Route::get('/doctor/patient-history/{patient}', [PatientHistoryController::class,'show'])->name('doctor.patient.history');
    });


    Route::middleware('patient')->group(function () {
        Route::get('/patient/dashboard', [PatientDashboardController::class, 'index'])->name('patient.dashboard');
        Route::get('/patient/doctors', [AppointmentController::class, 'doctors'])->name('patient.doctors');
        Route::get('/patient/appointments/book/{doctor_id}', [AppointmentController::class, 'book'])->name('patient.appointments.book');
        Route::post('/patient/appointments/store', [AppointmentController::class, 'store'])->name('patient.appointments.store');
        Route::get('/patient/appointments', [AppointmentController::class, 'myAppointments'])->name('patient.appointments');
        Route::get('/patient/billing', [BillingController::class, 'index'])->name('patient.billing');
        Route::get('/patient/support', function () {
            return view('patient.support.support');
        })->name('patient.support');
        Route::get('/patient/available-slots/{doctor}/{date}', [AppointmentController::class, 'availableSlots']);
        Route::get('/patient/prescription/{appointment}', [PatientPrescriptionController::class,'show'])->name('patient.prescription.show');
    });

});

require __DIR__ . '/auth.php';