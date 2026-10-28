<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Staff;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin()
    {
        $user = Auth::user();

        if ($user->role !== 'Admin') {
            abort(403);
        }

        $students = Student::orderBy('id')->get();
        $staff = Staff::latest()->get();
        $teachers = Teacher::latest()->get();

        return view('admin_dashboard', compact('students', 'staff', 'teachers'));
    }

    public function index()
{
    $students = Student::orderBy('id')->get();
    $staff = Staff::latest()->get();
    $teachers = Teacher::latest()->get();

    $editStudent = null; // important!

    return view('admin_dashboard', compact(
        'students',
        'staff',
        'teachers',
        'editStudent'
    ));
}
public function editStudent($id)
{
    $students = Student::orderBy('id')->get();
    $staff = Staff::latest()->get();
    $teachers = Teacher::latest()->get();

    $editStudent = Student::findOrFail($id);

    return view('admin_dashboard', compact(
        'students',
        'staff',
        'teachers',
        'editStudent'
    ));
}

public function deleteStudent($id)
{
    Student::findOrFail($id)->delete();

    return redirect('/admin')->with('success', 'Student deleted!');
}
}