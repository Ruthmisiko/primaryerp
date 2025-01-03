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
                        <a href="" class="btn btn-warning" style="margin-right: 10px;">
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
                                    
                                        <tr>
                                        
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"> </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"></p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold"></span>
                                            </td>
                                                                                   
                                            
                                        </tr>
                                  
                                    </tbody>
                                </table>
         
                    </div>
                </div>
                
            </div>
        </div>  

        @include('layouts.footers.auth.footer')
    </div>
@endsection
