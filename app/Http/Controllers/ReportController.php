<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Result;
use App\Models\Classs;

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
    public function show(string $id, Request $request)
    {
        $exam = Exam::findOrFail($id);

       // Start the query to fetch results
    $resultQuery = Result::where('exam_id', $id);

    // Check if class_id is passed in the request and filter the results
    if ($request->has('class_id') && $request->class_id != '') {
        $resultQuery->where('class_id', $request->class_id);
    }

    // Check if student_name is passed in the request and filter the results
    if ($request->has('name') && $request->name != '') {
        $resultQuery->where('name', 'like', '%' . $request->name . '%');
    }

    // Execute the query to get the filtered results
    $result = $resultQuery->paginate(10);

        $classes = Classs::all();


        return view ('pages.reports.exam', compact('exam','result','classes'));
    }
    // public function search(Request $request)
    // {
    //     // Validate input (optional)
    //     $request->validate([
    //         'class_id' => 'nullable|exists:classes,id',
    //         'name' => 'nullable|string|max:255',
    //     ]);
    
    //     // Build the query to filter by class and student name
    //     $query = Result::query();
    
    //     if ($request->has('class_id') && $request->class_id != '') {
    //         $query->where('class_id', $request->class_id); // Filter by class ID
    //     }
    
    //     if ($request->has('name') && $request->name != '') {
    //         $query->where('name', 'like', '%' . $request->name . '%'); // Filter by student name
    //     }
    
    //     // Fetch results
    //     $results = $query->get();
    
    //     // Return the filtered results to the view
    //     return view('pages.reports.exam', compact('results'));
    // }
    
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
