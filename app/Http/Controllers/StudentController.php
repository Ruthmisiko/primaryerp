<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index()
    {
        // Retrieve all students from the database
        $students = Student::all();

        $totalStudents = $students->count();
        

        // Return the view with the students data
        return view('pages.students.students', compact('students'));
    }

    /**
     * Store a newly created student in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'parent' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:100',
        ]);

        // Create new student entry
        Student::create([
            'name' => $validatedData['name'],
            'class' => $validatedData['class'],
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

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'parent' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:100',
        ]);

        // Find the student by id
        $student = Student::findOrFail($id);

        // Update the student's information in the database
        $student->update($validatedData);

        // Redirect back to the students index page with success message
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
