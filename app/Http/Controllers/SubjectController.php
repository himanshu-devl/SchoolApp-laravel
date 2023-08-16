<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
        ]);

        $subject = new Subject();
        $subject->subject = $request->input('subject');
        $subject->save();

        return redirect()->route('subjects.index')->with('success', 'Subject added successfully!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required|string|max:255'
        ]);

        $subject = subject::findOrFail($id);
        $subject->update($request->all());
        return redirect()->route('subjects.index')->with('success', 'subject updated successfully');
    }

    public function destroy($id)
    {
        $standard = subject::findOrFail($id);
        $standard->delete();
        return redirect()->route('subjects.index')->with('success', 'subject deleted successfully');
    }
    public function viewSubjects()
{
    $role = session('role');
    $subjects = Subject::all(); // Assuming you have an Eloquent model for subjects

    return view('view_subjects', compact('role', 'subjects'));
}

}
