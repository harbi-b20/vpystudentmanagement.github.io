<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Staff;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MyController extends Controller
{
    /* ================= DASHBOARD ================= */

public function adminDashboard()
{
    return view('admin_dashboard', [
        'students' => Student::all(),
        'staff' => Staff::all(),
        'teachers' => Teacher::all(),
    ]);
}
    /* ================= LOGIN ================= */

    public function showLogin()
    {
        return view('login');
    }
    

public function login(Request $request)
{
    $user = User::where('username', $request->username)->first();

    if ($user && $user->password === $request->password) {

        Auth::login($user);

        if ($user->role == 'Admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    return back()->with('error', 'Invalid login');
}
public function logout()
{
    Auth::logout();
    return redirect('/login');
}

    /* ================= STUDENTS ================= */

public function students()
{
    $students = \App\Models\Student::all();
    return view('students.index', compact('students'));
}

 public function storeStudent(Request $request)
{
    $math1 = $request->math_1st ?? 0;
    $math2 = $request->math_2nd ?? 0;
    $average = ($math1 + $math2) / 2;

    if ($average >= 98) {
        $status = 'With Highest Honors';
    } elseif ($average >= 95) {
        $status = 'With High Honors';
    } elseif ($average >= 90) {
        $status = 'With Honors';
    } elseif ($average >= 75) {
        $status = 'Passed';
    } else {
        $status = 'Failed';
    }

    Student::create([
        'first_name' => $request->first_name,
        'middle_initial' => $request->middle_initial,
        'last_name' => $request->last_name,
        'age' => $request->age,
        'address' => $request->address,
        'lrn' => $request->lrn,
        'math_1st' => $math1,
        'math_2nd' => $math2,
        'general_average' => $average,
        'status' => $status, 
    ]);

    return redirect()->route('admin.dashboard');
}
public function editStudent($id)
{
    return view('students.edit', [
        'student' => Student::findOrFail($id)
    ]);
}

public function updateStudent(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $math1 = $request->math_1st ?? 0;
    $math2 = $request->math_2nd ?? 0;

    $average = ($math1 + $math2) / 2;

    if ($average >= 98) {
        $status = 'With Highest Honors';
    } elseif ($average >= 95) {
        $status = 'With High Honors';
    } elseif ($average >= 90) {
        $status = 'With Honors';
    } elseif ($average >= 75) {
        $status = 'Passed';
    } else {
        $status = 'Failed';
    }

    $student->update([
        'first_name' => $request->first_name,
        'middle_initial' => $request->middle_initial,
        'last_name' => $request->last_name,
        'age' => $request->age,
        'address' => $request->address,
        'lrn' => $request->lrn,
        'math_1st' => $math1,
        'math_2nd' => $math2,
        'general_average' => $average,
        'status' => $status,
    ]);

    return redirect()->route('students');
}

    public function deleteStudent($id)
    {
        Student::where('id', $id)->delete();
        return redirect()->route('admin.dashboard');
    }


    public function recalculateStatuses()
{
    $students = Student::all();

    foreach ($students as $student) {

        $average = ($student->math_1st + $student->math_2nd) / 2;

        if ($average >= 98) {
            $status = 'With Highest Honors';
        } elseif ($average >= 95) {
            $status = 'With High Honors';
        } elseif ($average >= 90) {
            $status = 'With Honors';
        } elseif ($average >= 75) {
            $status = 'Passed';
        } else {
            $status = 'Failed';
        }

        $student->update([
            'general_average' => $average,
            'status' => $status
        ]);
    }

    return redirect()->route('admin.dashboard');
}

    /* ================= STAFF ================= */

    public function storeStaff(Request $request)
    {
        Staff::create($request->all());
        return redirect()->route('admin.dashboard');
    }
public function editStaff($id)
{
    return view('staff.index', [
        'staffList' => Staff::all(),
        'staff' => Staff::findOrFail($id)
    ]);
}

 public function updateStaff(Request $request, $id)
{
    $staff = Staff::findOrFail($id);

    $staff->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'position' => $request->position,
        'address' => $request->address,
        'status' => $request->status,
    ]);

    return redirect()->route('admin.dashboard');
}

    public function deleteStaff($id)
    {
        Staff::where('id', $id)->delete();
        return redirect()->route('admin.dashboard');
    }

    /* ================= TEACHERS ================= */

    public function storeTeacher(Request $request)
    {
        Teacher::create($request->all());
        return redirect()->route('admin.dashboard');
    }

public function editTeacher($id)
{
    return view('teachers.index', [
        'teacher' => Teacher::findOrFail($id),
        'teachers' => Teacher::all()
    ]);
}
    public function updateTeacher(Request $request, $id)
    {
       Teacher::where('id', $id)->update($request->except('_token'));
        return redirect()->route('admin.dashboard');
    }

    public function deleteTeacher($id)
    {
        Teacher::where('id', $id)->delete();
        return redirect()->route('admin.dashboard');
    }
}