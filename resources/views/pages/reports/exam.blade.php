@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Exam Details'])

    <div class="container-fluid py-4">
        <div class="row mt-4">
           <div class="col-md-4">
                <div class="card card-profile">
                    <img src="/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                    
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                        <div class="d-flex justify-content-between">
                        <a href=""  class="btn btn-success" style="margin-right: 10px;">
                            Edit
                        </a>
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i
                                    class="ni ni-collection"></i></a>
                        <form action=" " method="POST" class="d-inline-block" style="margin-right: 10px;">
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
                            <p><strong>Name:</strong> {{ $exam->name }}</p>
                            <p><strong>Category:</strong> {{ $exam->category }}</p>

                            <p><strong>Year:</strong> {{ $exam->year }}</p>
                           
                        </div>
                       
                    </div>
                    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                    
                        <!-- File input -->
                        <label for="file">Select File:</label>
                        <input type="file" name="file" id="file" required>
                    
                        <!-- Class dropdown -->
                        <label for="class_id">Select Class:</label>
                        <select name="class_id" id="class_id" required>
                            <option value="" disabled selected>Select a class</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    
                        <!-- Submit button -->
                        <button type="submit"  class="btn btn-success">Upload</button>
                    </form>
                    
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                
                
                <div class="col-lg-9 mb-lg-0 mb-4">
                    <div class="card ">
                        <div class="card-header pb-0 p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-2">Students Results</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                        
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                              STUDENTS  NAME</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                KISWAHILI</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ENGLISH</th>
                                               
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                              MATHEMATICS</th>
                                               <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                              CRE</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                HOMESCIENCE</th>
                                                
                                                     
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($exam->results as $result)
                                                                            
                                            <tr>
                                                <td>{{ $result->name }}</td>
                                                <td>{{ $result->kiswahili }}</td>
                                                <td class="text-center">{{ $result->English }}</td>
                                                <td class="text-center">{{ $result->Mathematics }}</td>
                                                <td class="text-center">{{ $result->CRE }}</td>
                                                <td class="text-center">{{ $result->Homescience }}</td>

                                                <td class="align-middle">
                                        
                                                    <a href="{{ route('reportt.pdf', $result->id) }}" class="btn btn-success"style=" margin-left: 30%;">
                                                        Download
                                                    </a>
                                              </td>
                                            </tr>
                                                                                
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No results found for this exam.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
           {{-- Pagination --}}
  
                    </div>
                </div>
                
            </div>
        </div>  

        @include('layouts.footers.auth.footer')
    </div>
@endsection
