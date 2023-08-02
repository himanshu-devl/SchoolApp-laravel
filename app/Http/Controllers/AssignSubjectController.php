<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Standard;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function index()
    {
        $standards = Standard::all();
        $subjects = Subject::all();

        return view('assign_subjects.index', compact('standards', 'subjects'));
    }

    public function assign(Request $request)
    {
        $standardId = $request->input('standard');
        $subjectIds = $request->input('subjects', []);

        $standard = Standard::find($standardId);
        $standard->subjects()->sync($subjectIds);

        return redirect()->route('dashboard')->with('success', 'Subjects assigned successfully to the standard.');
    }
}
