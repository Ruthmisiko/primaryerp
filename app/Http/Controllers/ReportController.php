<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Result;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $exams = Exam::paginate(10);


        return view('pages.reports.exams', compact('exams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|integer|min:1|max:9999',
        ]);

        // Create new exam entry
        Exam::create([
            'name' => $validatedData['name'],
            'category' => $validatedData['category'],
            'year' => $validatedData['year'],
        ]);

        return redirect()->route('reports.index')->with('success', 'Exam added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exam = Exam::findOrFail($id);

        $result = Result::all();

        return view ('pages.reports.exam', compact('exam','result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
