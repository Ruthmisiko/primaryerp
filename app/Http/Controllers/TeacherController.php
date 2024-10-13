<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Http\Requests\CreateTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;
use Flash;

class TeacherController extends AppBaseController
{
    /** @var TeacherRepository $teacherRepository*/
    private $teacherRepository;

    public function __construct(TeacherRepository $teacherRepo)
    {
        $this->teacherRepository = $teacherRepo;
    }

    /**
     * Display a listing of the Teacher.
     */
    public function index(Request $request)
    {
        // $teachers = $this->teacherRepository->paginate(10);

        // return view('teachers.index')
        //     ->with('teachers', $teachers);

          $teachers = Teacher::paginate(10);

        return view('pages.teachers.teachers', compact('teachers'));     

    }

    /**
     * Show the form for creating a new Teacher.
     */
    public function create()
    {
        return view('pages.teachers. add-teacher');
    }

    /**
     * Store a newly created Teacher in storage.
     */
    
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:teachers,email',
             'gender' => 'required|string',
             'contact_number' => 'required|string|max:15',
             'designation' => 'required|string|max:255',
             'assigned_class' => 'required|string|max:255',
         ]);
 
         $teacher = Teacher::create($validatedData);
 
        //  return response()->json($teacher, 201);
        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully');
     }



    /**
     * Display the specified Teacher.
     */
    // public function show($id)
    // {
    //     $teacher = $this->teacherRepository->find($id);

    //     if (empty($teacher)) {
    //         Flash::error('Teacher not found');

    //         return redirect(route('teachers.index'));
    //     }

    //     return view('teachers.show')->with('teacher', $teacher);
    // }
    public function show($id)
        {
            // Find the teacher by ID using the repository
            $teacher = $this->teacherRepository->find($id);

                      // Return the 'show-teacher' blade view and pass the teacher data
            return view('pages.teachers.showteacher', compact('teacher'));
        }
    /**
     * Show the form for editing the specified Teacher.
     */
    public function edit($id)
    {
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        return view('teachers.edit')->with('teacher', $teacher);
    }

    /**
     * Update the specified Teacher in storage.
     */
    public function update($id, UpdateTeacherRequest $request)
    {
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        $teacher = $this->teacherRepository->update($request->all(), $id);

        Flash::success('Teacher updated successfully.');

        return redirect(route('teachers.index'));
    }

    /**
     * Remove the specified Teacher from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $teacher = $this->teacherRepository->find($id);
    
        if (empty($teacher)) {
            Flash::error('Teacher not found');
            return redirect()->route('teachers.index');
        }
    
        $this->teacherRepository->delete($id);
        Flash::success('Teacher deleted successfully.');
    
        // Redirect to the teachers.index route to fetch the updated list
        return redirect()->route('teachers.index');
    }
}    
