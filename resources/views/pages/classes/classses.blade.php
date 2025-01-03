@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Classes'])
    
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Classes</h6>
                    </div>
                    <div class="add" style="display: flex; align-items: center;">
                        <!-- Add New Button to Trigger Modal -->
                        <button type="button" class="btn btn-success" style=" margin-left: 85%;" data-bs-toggle="modal" data-bs-target="#addTeacherModal">Add New</button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NAME</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CLASS TEACHER</th>
                                        <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STUDENTS</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classses as $class)
                                        <tr>
                                            <td>{{ $class->name }}</td>
                                            <td>{{ $class->teacher->name ?? 'No teacher assigned' }}</td>
                                            <!-- <td>{{ $class->students }}</td> -->
                                            <td>
                                                <a href="{{ route('classs.show', $class->id) }}" class="btn btn-success">View</a>
                                                <a href="{{ route('classs.edit', $class->id) }}" class="btn btn-info">Edit</a>
                                                <form action="" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this class?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- Pagination --}}
                            <div class="d-flex justify-content-center">
                                {!! $classses->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Adding Class -->
        <div class="modal fade" id="addTeacherModal" tabindex="-1" role="dialog" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTeacherModalLabel">Add Class</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('classs.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Class Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="teacher" class="form-label">Class Teacher</label>
                                <select class="form-control" id="teacher" name="teacher" required>
                                    <option value="">Select Class Teacher</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                                @error('teacher')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="students" class="form-label">Number of Students</label>
                                <input type="number" class="form-control" id="students" name="students" required>
                                @error('students')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Class</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
@endsection
