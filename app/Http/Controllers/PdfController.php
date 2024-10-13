<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use PDF; // Import DomPDF facade

class PdfController extends Controller
{
    public function index()
    {
        $students = Student::all(); // Fetch students from the database

        $totalStudents =  $students->count();
        
        // Load the view file and pass the students data to it
        $pdf = PDF::loadView('pages.students.students-pdf', compact('students', 'totalStudents'));

        // Download the PDF with a specific name
        return $pdf->download('students-list.pdf');
    }

    public function teacherp()
    {
        $teachers = Teacher::all(); 

        $totalTeachers =  $teachers->count();
        
        
        $pdf = PDF::loadView('pages.teachers.teachers-pdf', compact('teachers', 'totalTeachers'));

        // Download the PDF with a specific name
        return $pdf->download('teachers-list.pdf');
    }
}
