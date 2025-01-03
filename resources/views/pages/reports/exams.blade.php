@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Students'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-10">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Exam Categories</h6>
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            CATEGORY</th>   
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            YEAR</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($exams as $exam)
                                    <tr>
                                    
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$exam->name}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$exam->category}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$exam->year}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                              
                                        <td class="align-middle">
                                        
                                            <a href="{{ route('reports.show', $exam->id) }}" class="btn btn-success"style=" margin-left: 30%;">
                                                View
                                            </a>
                                            <a href=" " class="btn btn-info">
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
                                {!! $exams->links() !!}         

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
                        <h5 class="modal-title" id="addStudentModalLabel">Add New category</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('reports.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="class_id" class="form-label">Category</label>  
                                <input type="text" class="form-control" id="category" name="category" required>                    
                            </div>
                            <div class="mb-3">
                                <label for="class_id" class="form-label">Year</label> 
                                <input type="text" class="form-control" id="year" name="year" required>                     
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Exam</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth.footer')
    </div>
@endsection
