@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Student Details'])

    <div class="container-fluid py-4">
        
        <div class="col-md-4">
                <div class="card card-profile">
                    <img src="/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                    <img src="/img/team-2.jpg"
                                        class="rounded-circle img-fluid border border-2 border-white">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                        <div class="d-flex justify-content-between">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning" style="margin-right: 10px;">
                            Edit
                        </a>
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i
                                    class="ni ni-collection"></i></a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline-block" style="margin-right: 10px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                            <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i
                                    class="ni ni-email-83"></i></a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p><strong>Name:</strong> {{ $student->name }}</p>
                            <p><strong>Class:</strong> {{ $student->class }}</p>
                            <p><strong>Parent:</strong> {{ $student->parent }}</p>
                            <p><strong>Age:</strong> {{ $student->age }}</p>
                            <p><strong>Fee Balance:</strong> {{ $student->fee_balance }}</p>
                        </div>
                       
                    </div>
                    </div>
                </div>
            </div>
            <div class="card-footer" style="background-color: #f8f9fa; padding: 15px;">
                        <!-- <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning" style="margin-right: 10px;">
                            Edit
                        </a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline-block" style="margin-right: 10px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button> -->
                        </form>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Students</a>
            </div>

        @include('layouts.footers.auth.footer')
    </div>
@endsection
