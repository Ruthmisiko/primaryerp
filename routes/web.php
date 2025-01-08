<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;  
use App\Http\Controllers\TeacherController;  
use App\Http\Controllers\StudentController;  
use App\Http\Controllers\PdfController;
use App\Exports\StudentExport;
use App\Http\Controllers\ClasssController;  
use App\Http\Controllers\ReportController;  
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\MpesaSTKPUSHController;
use App\Http\Controllers\FileUploadController;

            


Route::get('/students', [StudentController::class, 'index'])->name('students.index');
// Show the form for creating a new student
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

Route::resource('students', StudentController::class);

// Store a newly created student
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');

// Edit a student (optional, if editing is implemented)

Route::get('students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

// In routes/web.php

Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');



Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');

Route::post('/teachers/store', [TeacherController::class, 'store'])->name('teachers.store');

Route::resource('teachers', TeacherController::class);

Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');

Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');

Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');


//class routes
Route::get('/classses', [ClasssController::class, 'index'])->name('classs.index');

Route::get('/classses/{id}', [ClasssController::class, 'show'])->name('classs.show');

Route::post('/classes/store', [ClasssController::class, 'store'])->name('classs.store');

Route::resource('classs', ClasssController::class);


// Edit Class Route
Route::get('/classs/{id}/edit', [ClasssController::class, 'edit'])->name('classs.edit');

// Update Class Route
Route::put('/classs/{id}', [ClasssController::class, 'update'])->name('classs.update');

//report routes
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

Route::post('/reports/store', [ReportController::class, 'store'])->name('reports.store');

Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');

Route::resource('reports', ReportController::class);


Route::post('/upload', [FileUploadController::class, 'upload'])->name('upload');




Route::get('generate-pdf',[PdfController::class, 'index']);

Route::get('download', function(){
    return Excel::download(new StudentExport, 'students.xlsx');
});

Route::get('generate-pdf', [PdfController::class, 'index'])->name('students.pdf');

Route::get('teacher-pdf', [PdfController::class, 'teacherp'])->name('teachers.pdf');

Route::get('reportt-pdf/{id}', [PdfController::class, 'reportp'])->name('reportt.pdf');

Route::post('/v1/mpesatest/stk/push', [MpesaSTKPUSHController::class, 'STKPush']);

Route::post('v1/confirm', [MpesaSTKPUSHController::class, 'STKConfirm'])->name('mpesa.confirm');

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
	

});