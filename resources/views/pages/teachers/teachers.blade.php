@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tables'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Teachers table</h6>
                    </div>
                     <!-- Add New Button to Trigger Modal -->
                     <div class="add" style="display: flex; align-items: center;">
                        <button type="button" class="btn btn-success" style=" margin-left: 90%;" data-bs-toggle="modal" data-bs-target="#addTeacherModal">Add New</button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            NAME</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            GENDER</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            CONTACT NUMBER</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            DESIGNTATION</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                        alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $teacher->name }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $teacher->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$teacher->gender}}</p>
                                            
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">{{$teacher->contact_number}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$teacher->designation}}</span>
                                        </td>
                                        <td class="align-middle">
                                        
                                                <a href="" class="btn btn-success">
                                                    View
                                                </a>
                                                <a href="" class="btn btn-info">
                                                    Edit
                                                </a>
                                                <a href="" class="btn btn-danger">
                                                   Delete
                                                </a>
                                        </td>
                                    </tr>
                                   
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTeacherLabel">Add New Teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addTeacherForm" method="POST" action="{{ route('teachers.store') }}">
                    @csrf
                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="teacherName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="teacherName" name="name" required>
                    </div>

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="teacherEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="teacherEmail" name="email" required>
                    </div>

                    <!-- Gender Field -->
                    <div class="mb-3">
                        <label for="teacherGender" class="form-label">Gender</label>
                        <select class="form-control" id="teacherGender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <!-- Contact Number Field -->
                    <div class="mb-3">
                        <label for="teacherContact" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="teacherContact" name="contact_number" required>
                    </div>

                    <!-- Designation Field -->
                    <div class="mb-3">
                        <label for="teacherDesignation" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="teacherDesignation" name="designation" required>
                    </div>

                    <!-- Subjects Taught Field (Dropdown) -->

                    <!-- Assigned Class Field -->
                    <div class="mb-3">
                        <label for="assignedClass" class="form-label">Assigned Class</label>
                        <input type="text" class="form-control" id="assignedClass" name="assigned_class" required>
                    </div>

                    <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>


        
        @include('layouts.footers.auth.footer')
    </div>
@endsection
