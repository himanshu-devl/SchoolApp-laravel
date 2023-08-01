<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;

class ChapterController extends Controller
{
    public function index()
    {
        $chapters = Chapter::all();
        return view('chapters.index', compact('chapters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'chapter' => 'required|string|max:255',
        ]);

        $chapter = new Chapter();
        $chapter->chapter = $request->input('chapter');
        $chapter->save();

        return redirect()->route('chapters.index')->with('success', 'Chapter added successfully!');
    }


}
