@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Students'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Students table</h6>
                    </div>
                    
                        
                    <!-- Add New Button to Trigger Modal -->
                    <div class="add" style="display: flex; align-items: center;">
                       <a href="{{ url('download') }}" class="btn btn-primary" style="margin-right: 15px; margin-left: 3%;"> <!-- Added margin-right -->
                            Download Excel
                        </a>
                        <a href="{{ route('students.pdf') }}" class="btn btn-primary">
                            Download PDF
                        </a>

                        <button type="button" class="btn btn-success" style=" margin-left: 65%;" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add New</button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                    
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            NAME</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            CLASS</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            PARENT</th>
                                           
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                           AGE</th>
                                           <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                           AGE</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                    
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"> {{ $student->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$student->class}}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">{{$student->parent}}</span>
                                        </td>
                                                                                <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$student->age}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$student->age}}</span>
                                        </td>
                                        <td class="align-middle">
                                        
                                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-success"style=" margin-left: 30%;">
                                                View
                                            </a>
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info">
                                                Edit
                                            </a>
                                            <a href="" class="btn btn-danger">Delete</a>
                                      </td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {!! $students->links() !!}



                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for adding a new student -->
        <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('students.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                        <label for="class_id" class="form-label">Class</label>
                        <select class="form-control" id="class_id" name="class_id" required>
                            <option value="">Select Class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                            <div class="mb-3">
                                <label for="parent" class="form-label">Parent</label>
                                <input type="text" class="form-control" id="parent" name="parent" required>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth.footer')
    </div>
@endsection
