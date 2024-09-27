<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Teacher;

use Illuminate\Http\Request;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();

        return view('pages.dashboard',  compact('totalStudents','totalTeachers'));
    }
}
