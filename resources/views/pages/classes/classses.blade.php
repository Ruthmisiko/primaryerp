@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tables'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Classes</h6>
                    </div>
                     <!-- Add New Button to Trigger Modal -->
                     <div class="add" style="display: flex; align-items: center;">
                     
                    <button type="button" class="btn btn-success" style=" margin-left: 85%;" data-bs-toggle="modal" data-bs-target="#addTeacherModal">Add New</button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            NAME</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            CLASS TEACHER</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            STUDENTS</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($classses as $class)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                
                                                <div class="d-flex flex-column justify-content-center">
                                                 <h6 class="mb-0 text-sm">{{ $class->id }}. {{ $class->name }}</h6>
                                                   
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$class->teachers}}</p>
                                            
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">{{$class->students}}</span>
                                        </td>
                                      
                                        <td class="align-middle">
                                        
                                        <a href="" class="btn btn-info">View</a>

                                                <a href="" class="btn btn-info">
                                                    Edit
                                                </a>
                                                <form action="" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this teacher?');">
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
            </div>
        </div>
        <div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherLabel" aria-hidden="true">
       
</div>   
                
    <div>     
        @include('layouts.footers.auth.footer')
    </div>
@endsection
