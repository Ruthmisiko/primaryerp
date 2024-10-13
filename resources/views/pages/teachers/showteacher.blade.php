@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

@include('layouts.navbars.auth.topnav', ['title' => 'Teacher Details'])

<div class="container-fluid py-4">
    <h1>Teacher Details</h1>
    <div class="card">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="me-3">
                <p><strong>Name:</strong> {{ $teacher->name }}</p>
                <p><strong>Email:</strong> {{ $teacher->email }}</p>
                <p><strong>Gender:</strong> {{ $teacher->gender }}</p>
                <p><strong>Contact Number:</strong> {{ $teacher->contact_number }}</p>
                <p><strong>Designation:</strong> {{ $teacher->designation }}</p>
                <p><strong>Assigned Class:</strong> {{ $teacher->assigned_class }}</p>
            </div>
            <div style="margin-right:30%;">
                <img src="{{ asset('img/sch.png') }}" alt="School Logo" class="img-fluid" style="max-width: 200px; height:200px;">
            </div>
        </div>
    </div>
    <a href="{{ route('teachers.index') }}" class="btn btn-secondary mt-3">Back to Teachers List</a>
</div>

@endsection
