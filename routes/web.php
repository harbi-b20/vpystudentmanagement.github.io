<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\StudentController;
use App\Models\Student;

Route::get('/', function () {
    return redirect('/login');
});

/* ================= LOGIN ================= */

Route::get('/login', [MyController::class, 'showLogin'])->name('login');
Route::post('/login', [MyController::class, 'login'])->name('login.process');

/* ================= LOGOUT ================= */

Route::post('/logout', [MyController::class, 'logout'])->name('logout');
/* ================= ADMIN DASHBOARD ================= */

Route::get('/admin/dashboard', [MyController::class, 'adminDashboard'])
    ->name('admin.dashboard');

    /* ================= USERR MA BOI DASHBOARD ================= */

Route::get('/user/dashboard', function () {

    $user = Auth::user();

    $classmates = Student::all();

    return view('user_dashboard', compact('user', 'classmates'));

})->name('user.dashboard');
/* ================= STUDENTS ================= */
Route::get('/students', [MyController::class, 'students'])->name('students');

Route::post('/students/save', [MyController::class, 'storeStudent'])
    ->middleware('auth')
    ->name('students.save');

Route::get('/students/edit/{id}', [MyController::class, 'editStudent'])
    ->middleware('auth')
    ->name('students.edit');

Route::post('/students/update/{id}', [MyController::class, 'updateStudent'])
    ->middleware('auth')
    ->name('students.update');

Route::post('/students/delete/{id}', [MyController::class, 'deleteStudent'])
    ->middleware('auth')
    ->name('students.delete');

Route::get('/recalculate-status', [MyController::class, 'recalculateStatuses']);
/* ================= STAFF ================= */

Route::post('/staff/save', [MyController::class, 'storeStaff'])
    ->middleware('auth')
    ->name('staff.save');

Route::get('/staff/edit/{id}', [MyController::class, 'editStaff'])
    ->middleware('auth')
    ->name('staff.edit');

Route::post('/staff/update/{id}', [MyController::class, 'updateStaff'])
    ->middleware('auth')
    ->name('staff.update');

Route::post('/staff/delete/{id}', [MyController::class, 'deleteStaff'])
    ->middleware('auth')
    ->name('staff.delete');

/* ================= TEACHERS ================= */

Route::post('/teachers/save', [MyController::class, 'storeTeacher'])
    ->middleware('auth')
    ->name('teachers.save');

Route::get('/teachers/edit/{id}', [MyController::class, 'editTeacher'])
    ->middleware('auth')
    ->name('teachers.edit');

Route::post('/teachers/update/{id}', [MyController::class, 'updateTeacher'])
    ->middleware('auth')
    ->name('teachers.update');

Route::post('/teachers/delete/{id}', [MyController::class, 'deleteTeacher'])
    ->middleware('auth')
    ->name('teachers.delete');