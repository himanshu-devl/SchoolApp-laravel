<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use Illuminate\Http\Request;
use App\Models\Student;

class AssignStudentController extends Controller
{
    public function index()
    {
        $standards = Standard::all();
        $students = Student::all();

        return view('assign_students.index', compact('standards', 'students'));
    }

    public function assign(Request $request)
    {
        $standardId = $request->input('standard');
        $studentIds = $request->input('students', []);

        $standard = Standard::find($standardId);
        $standard->students()->sync($studentIds);

        return redirect()->route('dashboard')->with('success', 'Students assigned successfully to the standard.');
    }
}
