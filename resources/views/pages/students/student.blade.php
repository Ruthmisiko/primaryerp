@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Student Details'])

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0" style="background-color: #f8f9fa;">
                        <h6 style="color: #333;">Student Details</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <table class="table table-bordered align-items-center mb-0" style="background-color: #fff; border-color: #dee2e6;">
                                <tbody>
                                    <tr>
                                        <th style="background-color: #f2f2f2; color: #555; padding: 10px;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                        <td style="padding: 10px;">
                                            <h6 class="mb-0 text-sm">{{ $student->name }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #f2f2f2; color: #555; padding: 10px;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Class</th>
                                        <td style="padding: 10px;">
                                            <p class="text-xs font-weight-bold mb-0">{{ $student->class }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #f2f2f2; color: #555; padding: 10px;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Parent</th>
                                        <td style="padding: 10px;">
                                            <p class="text-xs font-weight-bold mb-0">{{ $student->parent }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #f2f2f2; color: #555; padding: 10px;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Age</th>
                                        <td style="padding: 10px;">
                                            <p class="text-xs font-weight-bold mb-0">{{ $student->age }}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #f8f9fa; padding: 15px;">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning" style="margin-right: 10px;">
                            Edit
                        </a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline-block" style="margin-right: 10px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Students</a>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth.footer')
    </div>
@endsection
