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

}
