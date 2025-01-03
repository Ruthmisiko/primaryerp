<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClasssRequest;
use App\Http\Requests\UpdateClasssRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ClasssRepository;
use Illuminate\Http\Request;
use App\Models\Classs;
use App\Models\Teacher;
use Flash;

class ClasssController extends AppBaseController
{
    /** @var ClasssRepository $classsRepository*/
    private $classsRepository;

    public function __construct(ClasssRepository $classsRepo)
    {
        $this->classsRepository = $classsRepo;
    }

    /**
     * Display a listing of the Classs.
     */
    public function index(Request $request)
    {
        $classses = Classs::paginate(10);

        $teachers = Teacher:: all();

        return view('pages.classes.classses', compact('classses','teachers'));    
        
       
    }

    /**
     * Show the form for creating a new Classs.
     */
    public function create()
    {
        return view('pages.classes.add-class');
    }

    /**
     * Store a newly created Classs in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'teacher' => 'required|exists:teachers,id',  // Ensure a valid teacher is selected
            'students' => 'required|integer|min:1',     // Ensure students is a positive integer
        ]);
    
        // Create new class entry
        Classs::create([
            'name' => $validatedData['name'],
            'teachers' => $validatedData['teacher'],  // Storing the teacher ID
            'students' => $validatedData['students'], // Storing the student count
        ]);
    
        // Redirect to class list with a success message
        return redirect()->route('classs.index')->with('success', 'Class added successfully');
    }
    
    /**
     * Display the specified Classs.
     */
    // public function show($id)
    // {
    //     $classs = Classs::with('students')->find($id);

    //     return view('pages.classes.view', compact('classs'));
    // }
    public function show($id)
    {
        // Eager load students when fetching the class by id
        $class = Classs::with('students')->findOrFail($id);
    
           
        return view('pages.classes.view', compact('class'));
    }
    

    
    /**
     * Show the form for editing the specified Classs.
     */
    public function edit($id)
    {
        $classs = $this->classsRepository->find($id);
    
        if (empty($classs)) {
            Flash::error('Class not found');
            return redirect(route('classs.index'));
        }
    
        // Retrieve all teachers for the dropdown
        $teachers = Teacher::all();
    
        return view('pages.classes.edit', compact('classs', 'teachers'));
    }
    

    /**
     * Update the specified Classs in storage.
     */
    public function update($id, UpdateClasssRequest $request)
    {
        $classs = $this->classsRepository->find($id);
    
        if (empty($classs)) {
            Flash::error('Class not found');
            return redirect(route('classs.index'));
        }
    
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'teacher' => 'required|exists:teachers,id',
            'students' => 'required|integer|min:1',
        ]);
    
        // Update the class data
        $classs->update([
            'name' => $validatedData['name'],
            'teachers' => $validatedData['teacher'],
            'students' => $validatedData['students'],
        ]);
    
        Flash::success('Class updated successfully.');
        return redirect(route('classs.index'));
    }
    

    /**
     * Remove the specified Classs from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $classs = $this->classsRepository->find($id);

        if (empty($classs)) {
            Flash::error('Classs not found');

            return redirect(route('classses.index'));
        }

        $this->classsRepository->delete($id);

        Flash::success('Classs deleted successfully.');

        return redirect(route('classses.index'));
    }
}
