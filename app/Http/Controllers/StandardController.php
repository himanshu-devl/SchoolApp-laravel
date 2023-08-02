<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Standard;


class StandardController extends Controller
{
    public function index()
    {
        $standards = Standard::all();
        return view('standards.index', compact('standards'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'standard' => 'required|string|max:255'
        ]);

        Standard::create($request->all());
        return redirect()->route('standards.index')->with('success', 'Standard added successfully');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'standard' => 'required|string|max:255'
        ]);

        $standard = Standard::findOrFail($id);
        $standard->update($request->all());
        return redirect()->route('standards.index')->with('success', 'Standard updated successfully');
    }

    public function destroy($id)
    {
        $standard = Standard::findOrFail($id);
        $standard->delete();
        return redirect()->route('standards.index')->with('success', 'Standard deleted successfully');
    }
}
