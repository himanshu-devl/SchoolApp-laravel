<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Chapter;
use Illuminate\Http\Request;

class AssignChapterController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $chapters = Chapter::all();

        return view('assign_chapters.index', compact('subjects', 'chapters'));
    }

    public function assign(Request $request)
    {
        $subjectId = $request->input('subject');
        $chapterIds = $request->input('chapters', []);

        $subject = Subject::find($subjectId);
        $subject->chapters()->sync($chapterIds);

        return redirect()->route('dashboard')->with('success', 'Chapters assigned successfully.');
    }
}
