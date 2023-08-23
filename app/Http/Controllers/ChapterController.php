<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Events\ChapterStatusChanged;
use App\Jobs\NotifyChapterStatusChange;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChapterController extends Controller
{

    public function index()
    {
        $activeChapters = Chapter::where('active', true)->get();
        $inactiveChapters = Chapter::where('active', false)->get();

        return view('chapters.index', compact('activeChapters', 'inactiveChapters'));
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
    public function toggleChapterStatus(Request $request, $id)
    {
        $user = Auth::user();

        $chapter = Chapter::findOrFail($id);
        if ($request->active == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $chapter->update(['active' => $status]);


        event(new ChapterStatusChanged($chapter ,$user));





        return redirect()->route('chapters.index');
     }


}
