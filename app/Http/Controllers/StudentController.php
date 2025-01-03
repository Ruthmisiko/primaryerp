<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classs;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index()
    {
        // Retrieve all students from the database
        $students = Student::paginate(10);

        $totalStudents = $students->count();
        $classes = Classs::all();  

        // Return the view with the students data
        return view('pages.students.students', compact('students','classes'));
    }

    /**
     * Store a newly created student in the database.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classses,id',
            'parent' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:100',
        ]);

        // Create new student entry
        Student::create([
            'name' => $validatedData['name'],
            'class_id' => $validatedData['class_id'], 
            'parent' => $validatedData['parent'],
            'age' => $validatedData['age'],
        ]);

        // Redirect back to the students index page with success message
        return redirect()->route('students.index')->with('success', 'Student added successfully');
    }

    /**
     * Display the specified student.
     */
    public function show($id)
    {
        // Find the student by id
        $student = Student::findOrFail($id);

        // Return the view to show a specific student's details
        return view('pages.students.student', compact('student'));
    }


    public function edit($id)
    {
        // Find the student by ID
        $student = Student::findOrFail($id);
    
        // Fetch all classes for the dropdown
        $classes = Classs::all();
    
        // Return the edit view
        return view('pages.students.edit', compact('student', 'classes'));
    }
    
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classses,id', // Ensure the class ID is valid
            'parent' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:100',
        ]);
    
        // Find the student by ID
        $student = Student::findOrFail($id);
    
        // Update the student's information
        $student->update($validatedData);
    
        // Redirect back with a success message
        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }
    

    /**
     * Remove the specified student from storage.
     */
    public function destroy($id)
    {
        // Find the student by id
        $student = Student::findOrFail($id);

        // Delete the student from the database
        $student->delete();

        // Redirect back to the students index page with success message
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
