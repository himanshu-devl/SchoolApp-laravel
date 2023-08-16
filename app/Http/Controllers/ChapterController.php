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
    public function update(Request $request, $id)
    {
        $request->validate([
            'chapter' => 'required|string|max:255'
        ]);

        $chapter = chapter::findOrFail($id);
        $chapter->update($request->all());
        return redirect()->route('chapters.index')->with('success', 'Chapter updated successfully');
    }

    public function destroy($id)
    {
        $standard = Chapter::findOrFail($id);
        $standard->delete();
        return redirect()->route('chapters.index')->with('success', 'Standard deleted successfully');
    }

    public function viewChapters()
    {
        $role = session('role');
        $chapters = Chapter::all(); // Assuming you have an Eloquent model for chapters

        return view('view_chapters', compact('role', 'chapters'));
    }


}
